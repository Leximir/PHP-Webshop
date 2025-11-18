<?php

$router->get('/', 'index.php');
$router->get('/about', 'about.php');
$router->get('/contact', 'contact.php');

$router->get('/notes', 'notes/index.php')->only('auth');
$router->get('/note', 'notes/show.php')->only('auth');
$router->delete('/note', 'notes/destroy.php')->only('auth');
$router->get('/note/edit', 'notes/edit.php')->only('auth');
$router->patch('/note', 'notes/update.php')->only('auth');
$router->get('/notes/create', 'notes/create.php')->only('auth');
$router->post('/notes/create', 'notes/store.php')->only('auth');

$router->get('/products', 'products/index.php')->only('auth');

$router->get('/register', 'registration/create.php')->only('guest');
$router->post('/register', 'registration/store.php');

$router->get('/login', 'session/create.php')->only('guest');
$router->post('/session', 'session/store.php')->only('guest');
$router->delete('/session', 'session/destroy.php')->only('auth');

$router->get('/products', 'products/index.php');
$router->get('/product', 'products/show.php');

$router->get('/admin/products', 'admin/products/index.php')->only('auth');
$router->get('/admin/product', 'admin/products/show.php')->only('auth');
$router->delete('/admin/product', 'admin/products/destroy.php')->only('auth');
$router->get('/admin/product/edit', 'admin/products/edit.php')->only('auth');
$router->patch('/admin/product', 'admin/products/update.php')->only('auth');
$router->get('/admin/products/create', 'admin/products/create.php')->only('auth');
$router->post('/admin/products/create', 'admin/products/store.php')->only('auth');

$router->get('/test/images', 'test/index.php');
$router->post('/test/images', 'test/store.php');
