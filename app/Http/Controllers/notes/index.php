<?php

use Core\App;
use Core\Database;

$db = App::getContainer()->resolve(Database::class);

$notes = $db->query("SELECT * FROM notes WHERE user_id = :user_id",[
    'user_id' => userId()
])->get();

view("notes/index.view.php", [
    'heading' => 'Notes',
    'notes' => $notes
]);