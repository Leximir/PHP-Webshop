<?php

require "functions.php";
require "Database.php";
// require "router.php";

$db = new Database();
$posts = $db->query("SELECT * FROM posts WHERE id = 2")->fetch(PDO::FETCH_ASSOC);
dd($posts);