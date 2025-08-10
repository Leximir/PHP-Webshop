<?php

class Database {
    public $connection;
    public function __construct($config, $username = 'root', $password = '')
    {
        // Old $dsn :      $dsn="mysql:host=localhost;port=3306;dbname=my_app;charset=utf8mb4";
        $dsn = ('mysql:' . http_build_query($config, '', ';')); // => host=localhost;port=3306;dbname=my_app;charset=utf8mb4

        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }
    public function query($query, $params = [])
    {
        $statement = $this->connection->prepare($query);
        $statement->execute($params);
        return $statement;
    }
}