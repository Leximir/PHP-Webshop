<?php

namespace Http\Validator;

use Models\Image;

class ImagesValidator extends Validator
{
    public function extensionCheck($image)
    {
        if(!in_array($image, Image::ALLOWED_EXTENSIONS)){
            $this->addError('image',"Please choose an image with supported extensions: 'jpg', 'jpeg', 'png', 'gif'.");
        }
        return true;
    }
    public function resolutionCheck($image)
    {
        list($width, $height) = getimagesize($image);

        if($width > Image::MAX_IMAGE_WIDTH || $height > Image::MAX_IMAGE_HEIGHT){
            $this->addError('image',"Please choose an image with resolution of 1920x1080 pixels or lower.");
        }

        return true;
    }
    public function sizeCheck($image)
    {
        if($image > Image::MAX_FILE_SIZE){
            $this->addError('image',"Please choose an image with size lower than 5Mb.");
        }
        return true;
    }

}