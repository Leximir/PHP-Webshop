<?php

$noteModel = new \Models\Note();

view("notes/index.view.php", [
    'heading' => 'Notes',
    'notes' => $noteModel->all()
]);