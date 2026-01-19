<?php

namespace App\Core;

class Database
{
    private static $connection = null;

    public static function getConnection()
    {
        try {
            if (self::$connection === null) {
                self::$connection = new \PDO(
                    "mysql:host=" . Config::$database['host'] . ";dbname=" . Config::$database['name'],
                    Config::$database['user'],
                    Config::$database['pass']
                );
            }
            return self::$connection;
        } catch (\PDOException $e) {
            
            die("Database connection failed: " . $e->getMessage());
        }
    }
}
