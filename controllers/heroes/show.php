<?php

if(!isset($_GET['id'])) abort(404);

$db = new Database();

$sql = "SELECT heroes.id, heroes.user_id, heroes.name AS hero_name,
                heroes.description, heroes.image, users.name
                FROM heroes JOIN users ON heroes.user_id = users.id
                WHERE heroes.id = ?";

$hero = $db->query($sql, [$_GET['id']])->findOrFail();

if(!$hero) {
    abort(404);
}

if($_SERVER['REQUEST_METHOD'] === "POST") {

    $db->query("DELETE FROM heroes WHERE id = :id", [
            "id" => $_POST['id']
        ]);  

    header('location: /');
}

view('/heroes/show.view.php', [
    'heading' => 'Hero Page',
    'hero' => $hero
]);
