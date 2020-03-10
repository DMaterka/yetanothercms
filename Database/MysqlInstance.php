<?php


namespace Database;

use Database\Interfaces\DBInstanceInterface;

/**
 * Class MysqlInstance
 * @package Database
 * @author Daniel Materka <daniel.materka@gmail.com>
 */
class MysqlInstance implements DBInstanceInterface
{
    /**
     * @var \PDO $instance
     */
    protected $instance;

    /**
     * Mysql constructor.
     * Returns a connection to mysql db
     */
    public function __construct()
    {
        $connection = new \PDO(
            'mysql:host='.$_ENV['DB_HOST'].';
            port='.$_ENV['DB_PORT'].';
            dbname='.$_ENV['DB_DATABASE'],
            $_ENV['DB_USER'],
            $_ENV['DB_PASSWORD']
        );

        $connection->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);

        $this->instance = $connection;
    }

    /**
     * @return \PDO
     */
    public function getInstance(): \PDO
    {
        return $this->instance;
    }
}