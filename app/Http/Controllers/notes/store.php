<?php

use Http\Validator\NotesValidator;

$validator = new NotesValidator($_POST['body']);
$errors = $validator->getErrors();

if ($errors) {
    view("notes/create.view.php", [
        'heading' => "Create Note",
        'errors' => $errors
    ]);
    die();
}

(new \Models\Note())->insert($_POST['body']);

redirect('/notes');

