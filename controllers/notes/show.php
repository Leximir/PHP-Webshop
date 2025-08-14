<?php

$config = require base_path('config.php');
$db = new Database($config['database']);

$heading = "Note";

$note = $db->query("SELECT * FROM notes WHERE id = :id", [
    'id' => $_GET['id']
])->fetch();

if (!$note) {
    abort();
}

$currentUserId = 3;

if ($note['user_id'] !== $currentUserId) {
    abort(Response::FORBIDDEN);
}

view("notes/show.view.php",[
    'heading' => $heading,
    'note' => $note
]);