<?php

namespace Models;

class Product extends Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table = 'products';
    }

    public function insert($name, $description, $amount, $price, $imageName)
    {
        $this->db->query("INSERT INTO $this->table(name, description, amount, price, image) VALUES(:name, :description, :amount, :price, :image)", [
            'name' => $name,
            'description' => $description,
            'amount' => $amount,
            'price' => $price,
            'image' => $imageName
        ]);
    }


}