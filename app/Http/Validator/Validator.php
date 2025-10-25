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
    public static function integerCheck($value, $min = 0, $max = 1000000)
    {
        $value = trim($value);

        // Provera da li je validan integer i da li je u rasponu
        return filter_var($value, FILTER_VALIDATE_INT) !== false
            && $value >= $min
            && $value <= $max;
    }

    // ✅ Decimal validacija (float)
    public static function decimalCheck($value, $min = 0.0, $max = 1000000.0)
    {
        $value = trim($value);

        // Provera da li je validan decimalni broj i da li je u rasponu
        return filter_var($value, FILTER_VALIDATE_FLOAT) !== false
            && $value >= $min
            && $value <= $max;
    }

    public static function emailCheck($value)
    {
        $value = trim($value);

        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function addError($key, $message)
    {
        $this->errors[$key] = $message;
    }
}