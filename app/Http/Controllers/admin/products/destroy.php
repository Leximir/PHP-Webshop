<?php

$productModel = new \Models\Product();

//dd($_POST['id']);

$product = $productModel->whereID($_POST['id']);

if(!$product){
    abort();
}

$productModel->delete($_POST['id']);

redirect('/admin/products');