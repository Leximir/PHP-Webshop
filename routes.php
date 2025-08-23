<?php

$router->get('/', 'Http/controllers/index.php');
$router->get('/about', 'Http/controllers/about.php');
$router->get('/contact', 'Http/controllers/contact.php');

$router->get('/notes', 'Http/controllers/notes/index.php')->only('auth');
$router->get('/note', 'Http/controllers/notes/show.php')->only('auth');
$router->delete('/note', 'Http/controllers/notes/destroy.php')->only('auth');
$router->get('/note/edit', 'Http/controllers/notes/edit.php')->only('auth');
$router->patch('/note', 'Http/controllers/notes/update.php')->only('auth');
$router->get('/notes/create', 'Http/controllers/notes/create.php')->only('auth');
$router->post('/notes/create', 'Http/controllers/notes/store.php')->only('auth');

$router->get('/register', 'Http/controllers/registration/create.php')->only('guest');
$router->post('/register', 'Http/controllers/registration/store.php');

$router->get('/login', 'Http/controllers/session/create.php')->only('guest');
$router->post('/session', 'Http/controllers/session/store.php')->only('guest');
$router->delete('/session', 'Http/controllers/session/destroy.php')->only('auth');
