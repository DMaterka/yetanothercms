<?php

namespace Database;

/**
 * Class Database
 * @package Database
 */
class DB {

    /**
     * @var \PDO $connection
     */
    public static $connection;

    /**
     * @return \PDO
     */
    public static function getConnection() {
        if (empty(self::$connection)) {
            try {
                $connection = new \PDO(
                    'mysql:host=mysql;port=3306;dbname='. $_ENV['DB_DATABASE'],
                    'root',
                    $_ENV['DB_PASSWORD']
                );
                $connection->setAttribute( \PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION );
                self::$connection = $connection;
            } catch(\PDOException $e) {
                //todo throw
                echo 'Połączenie nie mogło zostać utworzone: ' . $e->getMessage();
            }
        }
        return self::$connection;
    }
}


