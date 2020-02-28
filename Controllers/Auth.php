<?php

namespace Controllers;

use Database\DB;
use Lcobucci\JWT\Builder;

/**
 * Class Login
 * @package Controllers
 */
class Auth extends AbstractController {

    /**
     * @param $params
     * @return mixed|void
     */
    public function showLoginForm($params) {
        return $this->render('login', $params);
    }

    /**
     * @param $params
     * @return void
     */
    public function login($params): void
    {
        $email = $params['email'];
        $password = $params['password'];
        $connection = DB::getConnection();
        $stmt = $connection->prepare('SELECT * FROM users WHERE email=?');
        $stmt->execute([$email]);
        $user = $stmt->fetch(\PDO::FETCH_ASSOC);

        if (password_verify($password, $user['password'])) {
            $time = time();
            $token = (new Builder())->issuedBy('http://localhost') // Configures the issuer (iss claim)
                ->permittedFor('http://localhost') // Configures the audience (aud claim)
                ->identifiedBy($user['id'], true) // Configures the id (jti claim), replicating as a header item
                ->issuedAt($time) // Configures the time that the token was issue (iat claim)
                ->canOnlyBeUsedAfter($time + 60) // Configures the time that the token can be used (nbf claim)
                ->expiresAt($time + 3600) // Configures the expiration time of the token (exp claim)
                ->withClaim('uid', $user['id']) // Configures a new claim, called "uid"
                ->getToken(); // Retrieves the generated token

            $token->getHeaders(); // Retrieves the token headers
            $token->getClaims(); // Retrieves the token claims
            setcookie('access_token', $token, $time + 3600, '', '', false, true);
            header('localhost/', true, '200');
        } else {
            header('localhost/', true, '403');
        }
    }

    public function logout($params) {
        setcookie('access_token', 0, time() + 3600, '', '', false, true);
        header("Location: http://localhost");
    }

    /**
     * @param $params
     * @return mixed|void
     */
    public function showRegistrationForm($params) {
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

        $register_sql = 'INSERT INTO users VALUES(?,?,?)';

        $stmt = $connection->prepare($register_sql);
        $stmt->execute([0, $email, password_hash($params['password'], PASSWORD_BCRYPT)]);
        header("Location: http://localhost");
    }

}