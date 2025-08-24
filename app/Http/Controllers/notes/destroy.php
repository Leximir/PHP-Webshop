<?php

use Core\App;
use Core\Database;
use Core\Response;

$db = App::getContainer()->resolve(Database::class);
$heading = "Note";

$note = $db->query("SELECT * FROM notes WHERE id = :id", [
    'id' => $_POST['id']
])->find();

if (!$note) {
    abort();
}

if ($note['user_id'] !== $currentUserId) {
    abort(Response::FORBIDDEN);
}

$db->query('DELETE FROM notes WHERE id = :id AND user_id = :user_id', [
    'id' => $_POST['id'],
    'user_id' => userId()
]);

redirect('/notes');