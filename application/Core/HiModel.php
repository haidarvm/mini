<?php

namespace Mini\Core;

use ActiveRecord;
use PDO;

class HiModel extends ActiveRecord {
    public function __construct() {
        try {
            ActiveRecord::setDb(new PDO("mysql:host=localhost;dbname=".DB_NAME, DB_USER, DB_PASS));
            // ActiveRecord::PREFIX = 'wput_';
            // ActiveRecord::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // ActiveRecord::$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch (\PDOException $e) {
            exit('Database connection could not be established.');
        }
    }
}