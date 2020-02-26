<?php
(PHP_SAPI !== 'cli' || isset($_SERVER['HTTP_USER_AGENT'])) && die('cli only');
require __DIR__ . '/vendor/autoload.php';
$connection =  \Database\DB::getConnection();

//create users table
$test = $connection->exec('
create table users(
   id INT NOT NULL AUTO_INCREMENT,
   email VARCHAR(40) NOT NULL,
   password VARCHAR(100) NOT NULL,
   PRIMARY KEY ( id )
);
');


//create articles table
$test = $connection->exec('
create table articles(
   id INT NOT NULL AUTO_INCREMENT,
   title VARCHAR(40) NOT NULL,
   content VARCHAR(100) NOT NULL,
   PRIMARY KEY ( id )
);
');