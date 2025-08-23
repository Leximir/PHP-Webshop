<?php

namespace Http\Validator;

class SessionValidator extends Validator
{
    public function __construct($email, $password)
    {
        $this->validateSessionEmail($email);
        $this->validateSessionPassword($password);
    }

    public function validateSessionEmail($email)
    {
        if(! self::emailCheck($email)){
            $this->addError('email',"Please provide a valid email address.");
        }
        return empty($this->errors);
    }

    public function validateSessionPassword($password)
    {
        if(! self::stringCheck($password, 7, 255)){
            $this->addError('password', "Please provide a password with at least 7 characters.");
        }
        return empty($this->errors);
    }
}