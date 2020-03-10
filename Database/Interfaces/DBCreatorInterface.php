<?php


namespace Database\Interfaces;

use Database\MysqlInstance;

interface DBCreatorInterface
{
    /**
     * @return DBInstanceInterface
     */
    public function create(): DBInstanceInterface;
}
