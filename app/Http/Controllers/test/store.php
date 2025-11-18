<?php

$image = new \Core\Images();
$validator = new \Http\Validator\ImagesValidator();

$validator->validateImageErrorHandling();
$validator->validateImageSize();
$validator->validateImageExtension();

$errors = $validator->getErrors();

if ($errors) {
    view("test/index.view.php", [
        'heading' => "Images",
        'errors' => $errors
    ]);
    die();
}