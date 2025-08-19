<?php

const BASE_PATH = __DIR__ . '/../';
session_start();
require BASE_PATH . "Core/functions.php";

spl_autoload_register(function ($class) {
//  We added namespaces to a lot of classes and now we need to tweak this function to work properly
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class); // This: Core\Database becomses : Core/Database, and continues to work properly

    require base_path("{$class}.php");
});

// Routing section
$router = new \Core\Router();
$routes = require base_path('routes.php');
$uri = $_SERVER['REQUEST_URI']; // We declare the current uri
$uri = parse_url($uri); // We parse that uri to path and query. Example: /products?id=5 , becomes array(2) { ["path"]=>string(8) "/products" ["query"]=>string(4) "id=5"}
$uri = $uri['path']; // We get only the path of the former array
$method = isset($_POST['_method']) ? $_POST['_method'] : $_SERVER['REQUEST_METHOD'];
$router->route($uri, $method);