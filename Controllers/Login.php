<?php

namespace Controllers;

use Database\DB;

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
     * @return bool
     */
    public function login($params) {

        $user = $params['user'];
        $password = $params['password'];

        $connection = DB::getConnection();

        return true;
    }

}