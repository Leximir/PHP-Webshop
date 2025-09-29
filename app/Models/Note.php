<?php

namespace Models;

use Core\Database;

class Note extends Model
{
//    public function whereID($id)
//    {
//        $note = $this->db->query("SELECT * FROM notes WHERE id = :id", [
//            'id' => $id
//        ])->find();
//        return $note;
//    }

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

    public function delete($id)
    {
        $this->db->query('DELETE FROM notes WHERE id = :id AND user_id = :user_id', [
            'id' => $id,
            'user_id' => userId()
        ]);
    }

}