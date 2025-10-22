<?php

namespace Models;

use Core\Database;

class Model {

    protected $db;
    protected $table;

    public function __construct()
    {
        $this->db = Database::db();
    }

    public function all()
    {

        $records = $this->db->query("SELECT * FROM $this->table")->get();

        if(!empty($records['user_id'])){
            $records = $this->db->query("SELECT * FROM $this->table WHERE user_id = :user_id", [
                'user_id' => userId()
            ])->get();
        }

        return $records;
    }

    public function whereID($id)
    {
        $record = $this->db->query("SELECT * FROM $this->table WHERE id = :id", [
            'id' => $id
        ])->find();
        return $record;
    }

    public function delete($id)
    {

        $record = $this->db->query("SELECT * FROM $this->table WHERE id = :id", [
            'id' => $id
        ])->find();

        if(!empty($record['user_id'])){
            $this->db->query("DELETE FROM $this->table WHERE id = :id AND user_id = :user_id", [
                'id' => $id,
                'user_id' => userId()
            ]);
        }

        $this->db->query("DELETE FROM $this->table WHERE id = :id", [
            'id' => $id
        ]);
    }
}