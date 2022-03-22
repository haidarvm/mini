<?php

namespace Mini\Core;

use Medoo\Medoo;

class DModel {
    public $db;
    public function __construct() {
        $database = new Medoo([
            'type' => 'mysql',
            'host' => 'localhost',
            'database' => DB_NAME,
            'username' => DB_USER,
            'password' => DB_PASS,
            'prefix' => DB_PREFIX
            // "logging" => true,
        ]);

        $this->db = $database;
    }
}
