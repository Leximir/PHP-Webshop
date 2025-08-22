<?php

namespace Core\Validator;

class NotesValidator extends Validator
{
    public function __construct($value)
    {
        $this->validateNotesBody($value);
    }

    public function validateNotesBody($value)
    {
        if (!Validator::stringCheck($value, 1, 1000)) {
            $this->addError('body', 'A body of no more than 1000 characters is required.');
        }

        return empty($this->errors);
    }
}