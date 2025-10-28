<?php

namespace Models;

use Http\Validator\ImagesValidator;

class Image extends Model
{
    const ALLOWED_EXTENSIONS = ['jpg', 'jpeg', 'png', 'gif'];
    const MAX_FILE_SIZE = 5 * 1024 * 1024; // 5Mb
    const MAX_IMAGE_WIDTH = 1920;
    const MAX_IMAGE_HEIGHT = 1080;

    public function uploadImage($image, $destination, $imageName)
    {
        $validator = new ImagesValidator();
        $validator->extensionCheck($image['name']);
        $validator->resolutionCheck($image['tmp_name']);
        $validator->sizeCheck($image['size']);

        $randomName = $imageName;

        if( !is_dir('./'.$destination) ) {
            mkdir('./'.$destination, 0755, true);
        }

        $this->upload($image['tmp_name'], $randomName, $destination);
    }

    public function upload($image, $finalName, $destination)
    {
        $finalDestination = $destination.'/'.$finalName;
        move_uploaded_file($image, $finalDestination);

//        $finalName = $this->db->real_escape_string($finalName);
//        $this->db->query("INSERT INTO images(image) VALUES ('$finalName')");
    }
    public function generateRandomName($extension)
    {
        return uniqid().".".$extension;
    }
}