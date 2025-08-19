<?php

namespace Core;
class Validator
{
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
}