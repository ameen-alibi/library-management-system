<?php 

namespace Core;

use App\Config\Config;
use PDO;

abstract class Model 
{
    protected static $db;

    protected static function getDB()
    {
        if (!isset(static::$db)) {
            static::$db = new PDO(
                "mysql:host=" . Config::DB_HOST . ";dbname=" . Config::DB_NAME . ";charset=utf8",
                Config::DB_USER,
                Config::DB_PASSWORD
            );
            
            // Set the PDO error mode to exception
            static::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        return static::$db;
    }
} 
