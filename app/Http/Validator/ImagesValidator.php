<?php

namespace Http\Validator;

use Core\Images;

class ImagesValidator extends Validator
{

    public function validateImageErrorHandling()
    {

        if($_FILES["image"]["error"] !== UPLOAD_ERR_OK){

            // Preko switch-a hvata konkretan tip greške
            switch($_FILES["image"]["error"]){
                case UPLOAD_ERR_PARTIAL:
                    $this->addError('image', 'File only partially uploaded.');
                    // Fajl je samo delimično uploadovan
                    break;
                case UPLOAD_ERR_NO_FILE:
                    $this->addError('image', 'No file was uploaded.');
                    // Nije izabran nijedan fajl
                    break;
                case UPLOAD_ERR_EXTENSION:
                    $this->addError('image', 'File upload stopped by a PHP extension.');
                    // Ekstenzija je zaustavila upload
                    break;
                case UPLOAD_ERR_FORM_SIZE:
                    $this->addError('image', 'File exceeds MAX_FILE_SIZE in the HTML form.');
                    // Premašuje max iz formulara
                    break;
                case UPLOAD_ERR_INI_SIZE:
                    $this->addError('image', 'File exceeds upload_max_filesize in php.ini.');
                    // Premašuje server limit
                    break;
                case UPLOAD_ERR_NO_TMP_DIR:
                    $this->addError('image', 'Temporary folder not found.');
                    // Ne postoji privremeni folder
                    break;
                case UPLOAD_ERR_CANT_WRITE:
                    $this->addError('image', 'Failed to write file.');
                    // Neuspešno pisanje na disk
                    break;
                default:
                    $this->addError('image', 'Unknown upload error.');
                    // Sve ostalo
                    break;
            }
        }
        return empty($this->errors);
    }

    public function validateImageSize()
    {
        // Limit veličine fajla (1MB)
        if($_FILES["image"]["size"] > Images::IMAGE_SIZE){
            $this->addError('image', 'File too large (max 1MB).');
        }
        return empty($this->errors);
    }

    public function validateImageExtension()
    {
        if(! in_array($_FILES['image']['type'], Images::MIME_TYPES)){
            $this->addError('image', 'Invalid file type.');
        }
        return empty($this->errors);
    }
}