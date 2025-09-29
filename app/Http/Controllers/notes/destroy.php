<?php

use Core\Response;

$noteModel = new \Models\Note();
$heading = "Note";

$note = $noteModel->whereID('notes', $_POST['id']);

if (!$note) {
    abort();
}

if ($note['user_id'] !== userId()) {
    abort(Response::FORBIDDEN);
}

$noteModel->delete($_POST['id']);

redirect('/notes');