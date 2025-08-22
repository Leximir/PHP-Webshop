<?php

use Core\App;
use Core\Database;
use Core\Validator\NotesValidator;

$db = App::getContainer()->resolve(Database::class);

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
    'user_id' => 3
]);

redirect('/notes');

