<?php

use Core\Response;
use Http\Validator\NotesValidator;

$noteModel = new \Models\Note();

// Find the corresponding note
$note = $noteModel->whereID('notes',$_POST['id']);

// Authorize that the current user can edit the note
if (!$note) {
    abort();
}

if ($note['user_id'] !== userId()) {
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
$noteModel->update($_POST['id'], $_POST['body']);

// Redirect hte user
redirect('/notes');


