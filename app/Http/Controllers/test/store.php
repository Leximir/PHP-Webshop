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

$image->checkIfDirectoryExists("./images/test/");
$destination = $image->makeSaveDestination("/images/test/");
// Premesta fajl iz privremenog foldera u uploads/
move_uploaded_file($_FILES["image"]["tmp_name"], $destination);

// Ako je sve prošlo OK
echo "File uploaded successfully.";