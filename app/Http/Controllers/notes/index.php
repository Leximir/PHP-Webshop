<?php

$notes = (new \Models\Note())->all('notes');

view("notes/index.view.php", [
    'heading' => 'Notes',
    'notes' => $notes
]);