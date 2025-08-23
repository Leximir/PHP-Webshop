<?php

use Core\Authenticator;
use Core\Session;
use Http\Validator\SessionValidator;

$email = $_POST['email'];
$password = $_POST['password'];
$auth = new Authenticator();

$validator = new SessionValidator($email,$password);
Session::flash('errors', $validator->getErrors());
if (Session::get('errors')) {
    redirect('/login');
}

if($auth->attempt($email, $password)){
    redirect('/');
} else {
    view('session/create.view.php', [
        'errors' => [
            'password' => 'No matching account found for that email address and password.'
        ]
    ]);
}

