<?php

namespace Controllers;

use Database\DB;

/**
 * Class Login
 * @package Controllers
 */
class Login extends AbstractController {

    /**
     * @param $params
     * @return mixed|void
     */
    public function show($params) {
        return $this->render('login', $params);
    }

    /**
     * @param $params
     * @return void
     */
    public function login($params) {

        $email = $params['email'];
        $password = $params['password'];

        $connection = DB::getConnection();
        $stmt = $connection->prepare('SELECT password FROM users WHERE email=?');
        $stmt->execute([$email]);
        $hash = $stmt->fetch(\PDO::FETCH_ASSOC);

        if (password_verify($password, $hash['password'])) {
            header("access_token: 123");
        } else {
            header("token: 0");
        }
    }

}