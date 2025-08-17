<?php

use Core\Database;
use Core\Response;

$config = require base_path('config.php');
$db = new Database($config['database']);

$currentUserId = 3;

$note = $db->query("SELECT * FROM notes WHERE id = :id", [
    'id' => $_GET['id']
])->find();

if (!$note) {
    abort();
}

if ($note['user_id'] !== $currentUserId) {
    abort(Response::FORBIDDEN);
}

view("notes/edit.view.php",[
    'heading' => 'Edit Note',
    'errors' => [],
    'note' => $note
]);