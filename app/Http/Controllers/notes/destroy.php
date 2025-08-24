<?php

use Core\App;
use Core\Database;
use Core\Response;

$noteModel = new \Models\Note();
$heading = "Note";

$note = $noteModel->whereID($_POST['id']);

if (!$note) {
    abort();
}

if ($note['user_id'] !== userId()) {
    abort(Response::FORBIDDEN);
}

$noteModel->delete($_POST['id']);

redirect('/notes');