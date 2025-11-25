<?php

namespace Core;

use Http\Validator\ImagesValidator;

class Images
{

    const IMAGE_SIZE = 1048576; // 1Mb
    const MIME_TYPES = ["image/gif", "image/png", "image/jpeg"];

    public function makeSaveDestination($directory)
    {
        // pathinfo izvlači ekstenziju i naziv fajla
        $pathInfo = pathinfo($_FILES["image"]["name"]);

        // Uzimamo originalni naziv fajla (bez ekstenzije)
        $base = $pathInfo["filename"];

        // Čisti naziv fajla tako da sadrži samo slova, brojeve, _ i -
        // Sve ostale karaktere zamenjuje sa "__"
        $base = preg_replace("/[^\w-]/", "__", $base);

        // Ponovo formira ime fajla: base + . + originalna ekstenzija
        $filename = $base . "." . $pathInfo['extension'];

        $destination = $_SERVER['DOCUMENT_ROOT'] . "$directory" . $filename;

        $i = 1;

        // Sprečava prepisivanje ako fajl već postoji
        while(file_exists($destination)){

            // Ako postoji, dodaje (1), (2)... u naziv fajla
            $filename = $base . "($i)." . $pathInfo['extension'];
            $destination = $_SERVER['DOCUMENT_ROOT'] . "$directory" . $filename;

            $i++;
        }

        // Putanja gde će fajl biti sačuvan
        return $_SERVER['DOCUMENT_ROOT'] . "$directory" . $filename;
    }

    public function checkIfDirectoryExists($directory)
    {
        if(! is_dir("$directory")){
            mkdir("$directory", 0755, true);
        }
    }

}