<?php

class Database {
    private static ?\PDO $pdo = null;

    public static function getConnection(): \PDO{
        if(self::$pdo == null){
            // create new PDO
            self::$pdo = new \PDO(
                'mysql:host=localhost:3306;dbname=bd203_db_uts',
                'root',
                ''
            );
        }

        return self::$pdo;
    }
}