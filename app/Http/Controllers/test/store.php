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

// pathinfo izvlači ekstenziju i naziv fajla
$pathInfo = pathinfo($_FILES["image"]["name"]);

// Uzimamo originalni naziv fajla (bez ekstenzije)
$base = $pathInfo["filename"];

// Čisti naziv fajla tako da sadrži samo slova, brojeve, _ i -
// Sve ostale karaktere zamenjuje sa "__"
$base = preg_replace("/[^\w-]/", "__", $base);

// Ponovo formira ime fajla: base + . + originalna ekstenzija
$filename = $base . "." . $pathInfo['extension'];

// Putanja gde će fajl biti sačuvan
$destination = $_SERVER['DOCUMENT_ROOT'] . "/images/test/" . $filename;

if(! is_dir('./images/test/')){
    mkdir('./images/test/', 0755, true);
}

$i = 1;

// Sprečava prepisivanje ako fajl već postoji
while(file_exists($destination)){

    // Ako postoji, dodaje (1), (2)... u naziv fajla
    $filename = $base . ".($i)" . $pathInfo['extension'];
    $destination = $_SERVER['DOCUMENT_ROOT'] . "/images/test/" . $filename;

    $i++;
}

// Premesta fajl iz privremenog foldera u uploads/
if(! move_uploaded_file($_FILES["image"]["tmp_name"], $destination)){
    exit("Can't move uploaded file");
}

// Ako je sve prošlo OK
echo "File uploaded successfully.";