<?php

$product = (new \Models\Product())->whereID($_GET['id']);

if(!$product){
    abort();
}

view("admin/products/edit.view.php", [
    'product' => $product,
    'heading' => 'Edit Product',
    'errors' => []
]);