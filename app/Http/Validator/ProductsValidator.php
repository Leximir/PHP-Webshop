<?php

namespace Http\Validator;

class ProductsValidator extends Validator
{
    public function __construct($value)
    {
        $this->validateProductsName($value['name']);
        $this->validateProductsDescription($value['description']);
        $this->validateProductsPrice($value['price']);
        $this->validateProductsAmount($value['amount']);
    }
    public function validateProductsName($value)
    {
        if(!Validator::stringCheck($value, 3, 100)) {
            $this->addError('name', 'A name of no more than 3 and no less than 100 characters is required.');
        }

        return empty($this->errors);
    }
    public function validateProductsDescription($value)
    {
        if(!Validator::stringCheck($value, 10, 1000)) {
            $this->addError('description', 'A description of no more than 10 and no less than 1000 characters is required.');
        }

        return empty($this->errors);
    }
    public function validateProductsPrice($value)
    {
        if(!Validator::decimalCheck($value, 10.00, 1000.00)){
            $this->addError('price', 'A value needs to be decimal, bigger than 10,00 and less than 1000.00');
        }

        return empty($this->errors);
    }
    public function validateProductsAmount($value)
    {
        if(!Validator::integerCheck($value, 1, 1000)){
            $this->addError('amount', 'A value needs to be whole number, bigger or equal to 1 and less or equal to 1000');
        }

        return empty($this->errors);
    }
}