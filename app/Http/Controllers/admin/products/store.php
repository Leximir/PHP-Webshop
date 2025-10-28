<?php

use Http\Validator\ProductsValidator;

$productModel = new \Models\Product();
$validator = new ProductsValidator($_POST);
$errors = $validator->getErrors();

if($errors){
    view('admin/products/create.view.php', [
        'heading' => 'Create A new Product',
        'errors' => $errors
    ]);
    die();
}

$image = new \Models\Image();
$imageName = $image->generateRandomName('jpg');
$image->uploadImage($_FILES['image'],'images/products',$imageName);

$productModel->insert($_POST['name'], $_POST['description'], $_POST['amount'], $_POST['price'], $imageName);

redirect('admin/products');