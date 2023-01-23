<?php

if(isset($_SESSION['id'])) abort(403);

require_once base_path("app/Validator.php");

$db = new Database();

if($_SERVER['REQUEST_METHOD'] === "POST") {

    $errors = [];

    $sql = "SELECT * FROM users WHERE email = :email";
    $res = $db->query($sql, [
        'email' => $_POST['email'],
    ])->find();

    //dd($res);

    if(!$res) {
        $errors['email'] = 'Wrong email';
    } 


    if($res && !password_verify($_POST['password'], $res['password'])) {
        $errors['password'] = "Wrong password";
    }


    if(empty($errors)) {
        $_SESSION['id'] = $res['id'];
        $_SESSION['name'] = $res['name'];
        header("location: /");
    }
}

view('/users/login.view.php', [
    'heading' => 'Login Page',
    'errors' => $errors ?? null
    
]);

