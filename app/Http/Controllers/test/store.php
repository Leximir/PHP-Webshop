<?php

$image = new \Core\Images();
$validator = new \Http\Validator\ImagesValidator();

if($validator->validateImageErrorHandling()){
    $validator->validateImageExtension();
};
$validator->validateImageSize();

$errors = $validator->getErrors();

if ($errors) {
    view("test/index.view.php", [
        'heading' => "Images",
        'errors' => $errors
    ]);
    die();
}