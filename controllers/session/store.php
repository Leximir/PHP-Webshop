<?php

use Core\Database;
use Core\Validator;

$config = require base_path('config.php');
$db = new Database($config['database']);

$email = $_POST['email'];
$password = $_POST['password'];
$errors = [];

if (! Validator::emailCheck($email)){
    $errors['email'] = "Please provide a valid email address.";
}

if (! Validator::stringCheck($password)){
    $errors['password'] = "Please provide a valid password.";
}

if(! empty($errors)){
    view('session/create.view.php',[
        'errors' => $errors
    ]);
    exit();
}

$user = $db->query("SELECT * FROM users WHERE email = :email", [
    'email' => $email
])->find();

if($user){
    if(password_verify($password, $user['password'])){

        $_SESSION['logged_in'] = true;
        $_SESSION['user'] = [
            'email' => $email
        ];

        session_regenerate_id(true);

        header("Location: /");
        exit();
    }
}

view('session/create.view.php',[
    'errors' => [
        'password' => 'No matching account found for that email address and password.'
    ]
]);