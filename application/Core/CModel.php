<?php

namespace Mini\Core;
use MarwaDB\DB;

class CModel  {

    public $db;
    public function __construct() {
        $config = [
            'default'=>
                [
                   'driver' => "mysql",
                   'host' => "localhost",
                   'port' => 3306,
                   'database' => DB_NAME,
                   'username' => DB_USER,
                   'password' => DB_PASS,
                   'charset' => "utf8mb4",
                ]
        ];
        $this->db = new DB($config);
        
    }
}