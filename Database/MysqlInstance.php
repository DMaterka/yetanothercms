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
            'mysql:host=mysql;port=3306;dbname='.$_ENV['DB_DATABASE'],
            'root',
            $_ENV['DB_PASSWORD']
        );

        $connection->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);

        $this->instance = $connection;
    }

    /**
     * @return \PDO $instance
     */
    public function getInstance()
    {
        return $this->instance;
    }
}