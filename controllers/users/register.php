<?php

if(isset($_SESSION['id'])) abort(403);

require_once base_path("app/Validator.php");

$db = new Database();

if($_SERVER['REQUEST_METHOD'] === "POST") {

    $errors = [];

    $res = $db->query("SELECT * FROM users WHERE email = ?", [$_POST['email'] ?? null])->find();
    //dd($res);
    
    if($res) {
        $errors['email'] = 'Email alredy exists';
    }

    if(!Validator::string($_POST['name'], 1, 100)) {
        $errors['name'] = 'Name must contain between 1 and 100 characters';
    }

    if(!Validator::string($_POST['password'], 8, 32)) {
        $errors['password'] = 'Password must contain between 8 and 32 characters';
    }

    if(!Validator::email($_POST['email'])) {
        $errors['email'] = 'Enter valid email';
    }

    if(!Validator::confirm($_POST['password'], $_POST['cpassword'])) {
        $errors['cpassword'] = 'Password and confirm password did not match';
    }

    if(empty($errors)) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password = password_hash($password, PASSWORD_DEFAULT);
        $timestamp = date("Y-m-d H:i:s");

        $db->query("INSERT INTO users (name, email, password, created_at) 
                                VALUES (:name, :email, :password, :created_at)", [
                                        "name" => $name,
                                        "email" => $email,
                                        "password" => $password,
                                        "created_at" => $timestamp
                                    ]); 
        $_SESSION['register_success'] = 'You have registerd successfully';                            
        header('location: /login');
    }

}

view('/users/register.view.php', [
    'heading' => 'Register Page',
    'errors' => $errors ?? null,
    'res' => $res ?? null
]);

