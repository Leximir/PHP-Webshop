<?php

use Core\App;
use Core\Database;
use Core\Validator\SessionValidator;
use Core\Validator\Validator;

$db = App::getContainer()->resolve(Database::class);

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

$user = $db->query("SELECT * FROM users WHERE email = :email", [
    'email' => $email
])->find();

if ($user) {
    if (password_verify($password, $user['password'])) {

        $_SESSION['logged_in'] = true;
        $_SESSION['user'] = [
            'email' => $email
        ];
        session_regenerate_id(true);

        redirect('/');
    }
}

view('session/create.view.php', [
    'errors' => [
        'password' => 'No matching account found for that email address and password.'
    ]
]);