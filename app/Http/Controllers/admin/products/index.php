<?php

$products = new \Models\Product();

view("admin/products/index.view.php", [
    'products' => $products->all(),
    'heading' => 'All Products'
]);