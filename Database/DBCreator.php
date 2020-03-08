<?php

namespace Database;

use Database\Interfaces\DBInstanceInterface;

/**
 * Class DBCreator
 * @package Database
 * @author Daniel Materka <daniel.materka@gmail.com>
 */
class DBCreator
{
    /**
     * @var DBInstanceInterface $connection
     */
    public static $connection;

    /**
     * @return DBInstanceInterface|MysqlInstance
     */
    public function create()
    {
        if (empty(self::$connection)) {
            switch (strtolower($_ENV['DB_TYPE'])) {
                case 'mysql':
                    self::$connection = new MysqlInstance();
                    break;
                default:
                    self::$connection = new MysqlInstance();
                    break;
            }
        }
        return self::$connection;
    }
}
