<?php

use Core\App;
use Core\Database;
use Core\Response;
use Http\Validator\NotesValidator;

$db = App::getContainer()->resolve(Database::class);

$currentUserId = $_SESSION['user']['id'];

// Find the corresponding note
$note = $db->query("SELECT * FROM notes WHERE id = :id", [
    'id' => $_POST['id']
])->find();

// Authorize that the current user can edit the note
if (!$note) {
    abort();
}

if ($note['user_id'] !== $currentUserId) {
    abort(Response::FORBIDDEN);
}

// Validate the form
$validator = new NotesValidator($_POST['body']);
$errors = $validator->getErrors();

if (count($errors)) {
    view('notes/edit.view.php', [
        'heading' => 'Edit Note',
        'errors' => $errors,
        'note' => $note
    ]);
    die();
}

// If no validation errors, update the record in the notes database table
$db->query("UPDATE notes SET body = :body WHERE id = :id", [
    'id' => $_POST['id'],
    'body' => $_POST['body']
]);

// Redirect hte user
redirect('/notes');


