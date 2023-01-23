<?php

$db = new Database();

$sql = "SELECT * FROM heroes";

$heroes = $db->query($sql)->get();

view('/heroes/index.view.php', [
    'heading' => 'Home Page',
    'heroes' => $heroes
]);
