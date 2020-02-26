<?php

namespace Database;

/**
 * Class Database
 * @package Database
 */
class DB {

    public static $connection;

    /**
     * @return \PDO
     */
    public static function getConnection() {
        if (empty(self::$connection)) {
            try {
                $connection = new \PDO(
                    'mysql:host=yetanothercms.docker;port=3306;dbname=cms',
                    'root',
                    'root'
                );
                self::$connection = $connection;
            } catch(PDOException $e) {
                //todo throw
                echo 'Połączenie nie mogło zostać utworzone: ' . $e->getMessage();
            }
        }
        return self::$connection;
    }

}


