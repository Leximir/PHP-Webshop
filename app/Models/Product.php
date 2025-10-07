<?php

namespace Models;

class Product extends Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table = 'products';
    }



}