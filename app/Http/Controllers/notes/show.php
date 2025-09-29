<?php

use Core\Response;

$noteModel = new \Models\Note();
$note = $noteModel->whereID('notes', $_GET['id']);

if (!$note) {
    abort();
}

if ($note['user_id'] !== userId()) {
    abort(Response::FORBIDDEN);
}

view("notes/show.view.php", [
    'heading' => "Note",
    'note' => $note
]);