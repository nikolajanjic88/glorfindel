<?php

if(!isset($_SESSION['id'])) {
    abort(403);
}

require_once base_path("app/Validator.php");

$db = new Database();

$errors = [];

if($_SERVER['REQUEST_METHOD'] === "POST") {

    if(!Validator::string($_POST['name'], 1, 100)) {
        $errors['name'] = 'Name must contain between 1 and 100 characters';
    }

    if(!Validator::string($_POST['description'], 1, 1000)) {
        $errors['description'] = 'Description must contain between 1 and 1000 characters';
    }

    if($_FILES['image']['tmp_name'] !== '') {
        //dd($_FILES['image']);
        $image_name = 'logos/'. microtime(true) . $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $size = $_FILES['image']['size'];
    
        if($size > 2000000) {
            $errors['image'] = 'File too big';
        }
       
        if(@!is_image($tmp_name)) {
            $errors['image'] = 'Not a valid format';
        } else move_uploaded_file($tmp_name, $image_name);

    }
    

    if(empty($errors)) {
        $timestamp = date("Y-m-d H:i:s");
        $db->query("INSERT INTO heroes (name, description, user_id, created_at, image) 
                                VALUES (:name, :description, :user_id, :created_at, :image)", [
                                        "name" => $_POST['name'],
                                        "description" => $_POST['description'],
                                        "user_id" => $_SESSION['id'],
                                        "created_at" => $timestamp,
                                        "image" => $image_name ?? null
                                    ]);  
        $_SESSION['message'] = 'Post created successfully';
        header("location: /");
    }

}

view("/heroes/create.view.php", [
    'heading' => 'Post Page',
    'errors' => $errors
]);
