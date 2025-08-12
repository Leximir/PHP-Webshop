<?php

function routeToController($uri, $routes)
{
    if (array_key_exists($uri, $routes)) {
        //dd($routes[$uri]);
        require $routes[$uri];
    } else {
        abort();
    }
}

function abort($code = 404)
{
    http_response_code($code);
    require 'views/' . $code . '.php';
    die();
}

$routes = [
    '/' => 'controllers/index.php',
    '/about' => 'controllers/about.php',
    '/contact' => 'controllers/contact.php',
    '/notes' => 'controllers/notes.php',
    '/note' => 'controllers/note.php'
];

$uri = $_SERVER['REQUEST_URI']; // We declare the current uri
$uri = parse_url($uri); // We parse that uri to path and query. Example: /products?id=5 , becomes array(2) { ["path"]=>string(8) "/products" ["query"]=>string(4) "id=5"}
$uri = $uri['path']; // We get only the path of the former array
routeToController($uri, $routes);