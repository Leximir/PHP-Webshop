<?php

use Core\Response;

$note = (new \Models\Note())->whereID($_GET['id']);

if (!$note) {
    abort();
}

if ($note['user_id'] !== userId()) {
    abort(Response::FORBIDDEN);
}

view("notes/edit.view.php", [
    'heading' => 'Edit Note',
    'errors' => [],
    'note' => $note
]);