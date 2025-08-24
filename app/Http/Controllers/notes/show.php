<?php

use Core\App;
use Core\Database;
use Core\Response;

$db = App::getContainer()->resolve(Database::class);

$currentUserId = $_SESSION['user']['id'];

$note = $db->query("SELECT * FROM notes WHERE id = :id", [
    'id' => $_GET['id']
])->find();

if (!$note) {
    abort();
}

if ($note['user_id'] !== $currentUserId) {
    abort(Response::FORBIDDEN);
}

view("notes/show.view.php", [
    'heading' => "Note",
    'note' => $note
]);