<?php
(PHP_SAPI !== 'cli' || isset($_SERVER['HTTP_USER_AGENT'])) && die('cli only');
require __DIR__ . '/vendor/autoload.php';
$dotenv = new \Symfony\Component\Dotenv\Dotenv();
$dotenv->load(__DIR__.'/.env');

try {
    $connection =  \Database\DB::getConnection();
    $connection->beginTransaction();

    //create users table
    $connection->query('
        create table users(
        id INT NOT NULL AUTO_INCREMENT,
        email VARCHAR(40) NOT NULL,
        password VARCHAR(100) NOT NULL,
        PRIMARY KEY ( id )
        );
    ');

    //create articles table
    $connection->query('
        create table articles(
           id INT NOT NULL AUTO_INCREMENT,
           title VARCHAR(40) NOT NULL,
           intro VARCHAR(100) NOT NULL,
           content VARCHAR(255) NOT NULL,
           PRIMARY KEY ( id )
        );
    ');

    $connection->commit();

} catch (PDOException $exception) {
    echo  $exception->getMessage();
}