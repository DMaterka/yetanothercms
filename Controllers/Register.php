<?php

namespace Controllers;

use Database\DB;

class Register extends AbstractController {

    /**
     * @param $params
     * @return mixed|void
     */
    public function show($params) {
        return $this->render('register', $params);
    }

    /**
     * @param $params
     * @return string
     * @throws \Exception
     */
    public function register($params) {
        // todo validate params

        $email = $params['email'];
        if ( $params['password'] !== $params['password_repeat']) {
            throw new \Exception('Passwords do not match');
        }
        $connection = DB::getConnection();

        //does the user exist?
        $sql = "SELECT * FROM users WHERE email=?";

        $stmt = $connection->prepare($sql);
        $stmt->execute([$email]);
        if (!empty($stmt->fetchAll(\PDO::FETCH_ASSOC))) {
            throw new \Exception('User already exists');
        }

        $register_sql = 'INSERT INTO users SET email=? AND password=?';

        $stmt = $connection->prepare($register_sql);
        $stmt->execute([$email, password_hash($params['password'])], PASSWORD_BCRYPT);


    }

}