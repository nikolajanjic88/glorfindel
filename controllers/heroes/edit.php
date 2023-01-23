<?php

require_once base_path("app/Validator.php");

$db = new Database();

$sql = "SELECT * FROM heroes WHERE id = ?";

$hero = $db->query($sql, [$_GET['id']])->findOrFail();

if(!isset($_SESSION['id']) || $_SESSION['id'] !== $hero['user_id']) {
    abort(403);
}

//dd($hero);
$errors = [];

if($_SERVER['REQUEST_METHOD'] === "POST") {

    if(!Validator::string($_POST['name'], 1, 100)) {
        $errors['name'] = 'Name must contain between 1 and 100 characters';
    }

    if(!Validator::string($_POST['description'], 1, 1000)) {
        $errors['description'] = 'Description must contain between 1 and 1000 characters';
    }

    if(empty($errors)) {
        $timestamp = date("Y-m-d H:i:s");
        $db->query("UPDATE heroes SET 
                            name = :name, description = :description, updated_at = :updated_at
                            WHERE id = :id", [
                                    "name" => $_POST['name'],
                                    "description" => $_POST['description'],
                                    "updated_at" => $timestamp,
                                    "id" => $_GET['id']
                                ]); 

        $_SESSION['update'] = 'Post updated successfully';
        header("location: /hero?id={$hero['id']}");                         
        
    }

}

view("/heroes/edit.view.php", [
    'heading' => 'Edit Page',
    'errors' => $errors,
    'hero' => $hero
]);
