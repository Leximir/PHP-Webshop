<?php

$router->get('/', 'app/Http/controllers/index.php');
$router->get('/about', 'app/Http/controllers/about.php');
$router->get('/contact', 'app/Http/controllers/contact.php');

$router->get('/notes', 'app/Http/controllers/notes/index.php')->only('auth');
$router->get('/note', 'app/Http/controllers/notes/show.php')->only('auth');
$router->delete('/note', 'app/Http/controllers/notes/destroy.php')->only('auth');
$router->get('/note/edit', 'app/Http/controllers/notes/edit.php')->only('auth');
$router->patch('/note', 'app/Http/controllers/notes/update.php')->only('auth');
$router->get('/notes/create', 'app/Http/controllers/notes/create.php')->only('auth');
$router->post('/notes/create', 'app/Http/controllers/notes/store.php')->only('auth');

$router->get('/register', 'app/Http/controllers/registration/create.php')->only('guest');
$router->post('/register', 'app/Http/controllers/registration/store.php');

$router->get('/login', 'app/Http/controllers/session/create.php')->only('guest');
$router->post('/session', 'app/Http/controllers/session/store.php')->only('guest');
$router->delete('/session', 'app/Http/controllers/session/destroy.php')->only('auth');
