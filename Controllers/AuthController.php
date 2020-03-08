<?php

namespace Controllers;

use Lcobucci\JWT\Builder;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints\Collection;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Type;

/**
 * Class AuthController
 * @package Controllers
 * @author Daniel Materka <daniel.materka@gmail.com>
 */
class AuthController extends AbstractController
{
    /**
     * @param $params
     * @return mixed|void
     */
    public function showLoginForm($params)
    {
        return $this->render('login', $params);
    }

    /**
     * @param $params
     * @return void
     */
    public function login(Request $request)
    {
        $rules = new Collection([
            'email' => [
                new Email()
            ],
            'password' => [
                new Type('string')
            ]
        ]);

        $this->validator->validate($request, $rules);

        $email = $request->request->get('params')['email'];
        $password = $request->request->get('params')['password'];

        //TODO method getByKey
        $stmt = $this->dbConn->prepare('SELECT * FROM users WHERE email=?');
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
            return (new RedirectResponse('/'));
        } else {
            return (new Response('Invalid credentials', 403));
        }
    }

    /**
     * @param $params
     * @return RedirectResponse
     */
    public function logout()
    {
        setcookie('access_token', 0, time() + 3600, '', '', false, true);
        return (new RedirectResponse('/'));
    }

    /**
     * @param $params
     * @return mixed|void
     */
    public function showRegistrationForm($params)
    {
        return $this->render('register', $params);
    }

    /**
     * @param $params
     * @return RedirectResponse
     * @throws \Exception
     */
    public function register(Request $request): RedirectResponse
    {
        // todo validate params
        $email = $request->request->get('params')['email'];
        $password = $request->request->get('params')['password'];
        $passwordRepeat = $request->request->get('params')['password_repeat'];
        if ($password !== $passwordRepeat) {
            throw new \Exception('Passwords do not match');
        }

        //does the user exist?
        $sql = "SELECT * FROM users WHERE email=?";

        $stmt = $this->dbConn->prepare($sql);
        $stmt->execute([$email]);
        if (!empty($stmt->fetchAll(\PDO::FETCH_ASSOC))) {
            throw new \Exception('User already exists');
        }

        $register_sql = 'INSERT INTO users VALUES(?,?,?)';

        $stmt = $this->dbConn->prepare($register_sql);
        $stmt->execute([0, $email, password_hash($request->request->get('params')['password'], PASSWORD_BCRYPT)]);
        return (new RedirectResponse('/'));
    }

}