<?php

$config = require 'config.php';
$db = new Database($config['database']);

$heading = "Create Note";

if($_SERVER["REQUEST_METHOD"] === "POST"){

    $body = trim($_POST['body']);
    $errors = [];

    if(strlen($body) === 0){
        $errors['body'] = "A body is required.";
    }

    if(strlen($body) > 1000){
        $errors['body'] = "The body cannot be more than 1000 characters.";
    }

    if(empty($errors)){
        $db->query("INSERT INTO notes(body, user_id) VALUES(:body, :user_id)", [
            'body' => $body,
            'user_id' => 3
        ]);
    }
}



require "views/note-create.view.php";