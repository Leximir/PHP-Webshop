<?php

use Core\Database;
use Core\Validator\RegistrationValidator;

$email = $_POST['email'];
$password = $_POST['password'];

$validator = (new RegistrationValidator($email, $password));
if ($validator->getErrors()) {
    view('registration/create.view.php', [
        'errors' => $validator->getErrors()
    ]);
    die();
}

// Check if the account already exists
$db = App::getContainer()->resolve(Database::class);

$user = $db->query("SELECT * FROM users WHERE email = :email", [
    'email' => $email
])->find();

if ($user) {
    // if yes, redirect to login page
    redirect('/login');
} else {
    // if not, save one to the database, and then log the user in, and redirect
    $db->query("INSERT INTO users(email, password) VALUES (:email, :password)", [
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT)
    ]);
    // Mark that tha user has logged in
    $_SESSION['logged_in'] = true;
    $_SESSION['user'] = [
        'email' => $email
    ];

    redirect('/');
}

