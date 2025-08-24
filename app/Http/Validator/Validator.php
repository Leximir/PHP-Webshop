<?php

namespace Http\Validator;
class Validator
{
    protected $errors = [];
    public static function stringCheck($value, $min = 1, $max = 1000)
    {

        $value = trim($value);

        return strlen($value) >= $min && strlen($value) <= $max;
    }

    public static function emailCheck($value)
    {
        $value = trim($value);

        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    public function getErrors(){
        return $this->errors;
    }
    public function addError($key, $message){
        $this->errors[$key] = $message;
    }
}