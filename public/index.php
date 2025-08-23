<?php

use Core\Session;

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . "vendor/autoload.php";

session_start();

require BASE_PATH . "Core/functions.php";

// Service Container
require base_path('bootstrap.php');

// Routing section
$router = new \Core\Router();
$routes = require base_path('routes.php');
$uri = $_SERVER['REQUEST_URI']; // We declare the current uri
$uri = parse_url($uri); // We parse that uri to path and query. Example: /products?id=5 , becomes array(2) { ["path"]=>string(8) "/products" ["query"]=>string(4) "id=5"}
$uri = $uri['path']; // We get only the path of the former array
$method = isset($_POST['_method']) ? $_POST['_method'] : $_SERVER['REQUEST_METHOD'];
$router->route($uri, $method);

// Clear temporary Session data
Session::unflash();
