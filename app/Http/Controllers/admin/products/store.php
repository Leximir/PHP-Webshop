<?php

use Http\Validator\ProductsValidator;

$validator = new ProductsValidator($_POST);
$errors = $validator->getErrors();

if($errors){
    view('admin/products/create.view.php', [
        'heading' => 'Create A new Product',
        'errors' => $errors
    ]);
    die();
}

dd($_POST);