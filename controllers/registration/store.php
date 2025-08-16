<?php

use Core\Database;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];
$errors = [];
// dd(Validator::emailCheck('lexa@gmail.com'));
// Validate the form inputs
if (! Validator::emailCheck($email)){
    $errors['email'] = "Please provide a valid email addres.";
}

if (! Validator::stringCheck($password, 7, 255)){
    $errors['password'] = "Please provide a password with at least 7 characters.";
}

if(! empty($errors)){
    view('registration/create.view.php',[
        'errors' => $errors
    ]);
    die();
}

// Check if the account already exists
$config = require base_path('config.php');
$db = new Database($config['database']);

$result = $db->query("SELECT * FROM users WHERE email = :email",[
    'email' => $email
])->find();
    // if yes, redirect to login page
    // if not, save one to the database, and then log the user in, and redirect