<?php

use Core\App;
use Core\Database;

$db = App::getContainer()->resolve(Database::class);

$currentUser = $_SESSION['user']['id'];

$notes = $db->query("SELECT * FROM notes WHERE user_id = :user_id",[
    'user_id' => $currentUser
])->get();

view("notes/index.view.php", [
    'heading' => 'Notes',
    'notes' => $notes
]);