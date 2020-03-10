<?php


namespace Database\Interfaces;

/**
 * Interface DBInstanceInterface
 * @package Database\Interfaces
 */
interface DBInstanceInterface
{
    /**
     * @return \PDO
     */
    public function getInstance(): \PDO;
}