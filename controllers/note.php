<?php

$config = require 'config.php';
$db = new Database($config['database']);

$heading = "Note";

$id = $_GET['id'];
$note = $db->query("SELECT * FROM notes WHERE id = :id", ['id' => $id])->fetch();
//dd($notes);
require "views/note.view.php";