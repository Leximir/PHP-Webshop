<?php

use Core\Database;
use Core\Response;

$config = require base_path('config.php');
$db = new Database($config['database']);

$heading = "Note";

$currentUserId = 3;

$note = $db->query("SELECT * FROM notes WHERE id = :id", [
    'id' => $_GET['id']
])->fetch();

if (!$note) {
    abort();
}

if ($note['user_id'] !== $currentUserId) {
    abort(Response::FORBIDDEN);
}

if($_SERVER['REQUEST_METHOD'] === "POST"){
    // Delete the current note

    $db->query('DELETE FROM notes WHERE id = :id AND user_id = :user_id',[
        'id' => $_POST['id'],
        'user_id' => $currentUserId
    ]);

    header("Location: /notes");
    exit();

}

view("notes/show.view.php",[
    'heading' => $heading,
    'note' => $note
]);