<?php

$notes = (new \Models\Note())->all();

view("notes/index.view.php", [
    'heading' => 'Notes',
    'notes' => $notes
]);