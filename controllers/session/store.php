<?php

use Core\Authenticator;
use Core\Validator\SessionValidator;

$email = $_POST['email'];
$password = $_POST['password'];

$validator = new SessionValidator($email,$password);
$errors = $validator->getErrors();

if ($errors) {
    view('session/create.view.php', [
        'errors' => $errors
    ]);
    exit();
}

$auth = new Authenticator();

if($auth->attempt($email, $password)){
    redirect('/');
} else {
    view('session/create.view.php', [
        'errors' => [
            'password' => 'No matching account found for that email address and password.'
        ]
    ]);
}

