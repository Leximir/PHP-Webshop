<?php

use Core\App;
use Core\Database;
use Http\Validator\NotesValidator;

$db = App::getContainer()->resolve(Database::class);
$currentUser = $_SESSION['user']['id'];
$validator = new NotesValidator($_POST['body']);
$errors = $validator->getErrors();

if ($errors) {
    view("notes/create.view.php", [
        'heading' => "Create Note",
        'errors' => $errors
    ]);
    die();
}

$db->query("INSERT INTO notes(body, user_id) VALUES(:body, :user_id)", [
    'body' => $_POST['body'],
    'user_id' => $currentUser
]);

redirect('/notes');

