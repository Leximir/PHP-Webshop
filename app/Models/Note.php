<?php

namespace Models;

use Core\Database;

class Note extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'notes';
    }

    public function insert($body)
    {
        $this->db->query("INSERT INTO notes(body, user_id) VALUES(:body, :user_id)", [
            'body' => $body,
            'user_id' => userId()
        ]);
    }

    public function update($id, $body)
    {
        $this->db->query("UPDATE notes SET body = :body WHERE id = :id", [
            'id' => $id,
            'body' => $body
        ]);
    }
}