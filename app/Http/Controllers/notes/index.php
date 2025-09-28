<?php

view("notes/index.view.php", [
    'heading' => 'Notes',
    'notes' => new \Models\Note()->all('notes')
]);