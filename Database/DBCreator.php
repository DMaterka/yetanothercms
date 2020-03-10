<?php

namespace Database;

use Database\Interfaces\DBCreatorInterface;
use Database\Interfaces\DBInstanceInterface;

/**
 * Class DBCreator
 * @package Database
 * @author Daniel Materka <daniel.materka@gmail.com>
 */
class DBCreator implements DBCreatorInterface
{
    /**
     * @var DBInstanceInterface $connection
     */
    public static $connection;

    /**
     * @return DBInstanceInterface
     */
    public function create(): DBInstanceInterface
    {
        if (empty(self::$connection)) {
            switch (strtolower($_ENV['DB_TYPE'])) {
                default:
                case 'mysql':
                    self::$connection = new MysqlInstance();
                    break;
            }
        }
        return self::$connection;
    }
}
