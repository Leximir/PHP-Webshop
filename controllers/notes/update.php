<?php

use Core\Database;
use Core\Response;
use Core\Validator;

$config = require base_path('config.php');
$db = new Database($config['database']);

$currentUserId = 3;
$errors = [];

// Find the corresponding note
$note = $db->query("SELECT * FROM notes WHERE id = :id", [
    'id' => $_POST['id']
])->fetch();

// Authorize that the current user can edit the note
if (!$note) {
    abort();
}

if ($note['user_id'] !== $currentUserId) {
    abort(Response::FORBIDDEN);
}

// Validate the form
if(! Validator::stringCheck($_POST['body'], 1, 1000)){
    $errors['body'] = "A body of no more than 1000 characters is required.";
}

if(count($errors)){
    view('notes/edit.view.php',[
        'heading' => 'Edit Note',
        'errors' => $errors,
        'note' => $note
    ]);
}

// If no validation errors, update the record in the notes database table
$db->query("UPDATE notes SET body = :body WHERE id = :id", [
    'id' => $_POST['id'],
    'body' => $_POST['body']
]);

// Redirect hte user
header("Location: /notes");
die();


