<?php

namespace Models;

use Core\Database;

class Model {

    protected $db;

    public function __construct()
    {
        $this->db = Database::db();
    }

    public function all($table)
    {
        $records = $this->db->query("SELECT * FROM $table WHERE user_id = :user_id", [
            'user_id' => userId()
        ])->get();
        return $records;
    }

    public function whereID($table, $id)
    {
        $record = $this->db->query("SELECT * FROM $table WHERE id = :id", [
            'id' => $id
        ])->find();
        return $record;
    }



}