<?php


namespace App;


use Lcobucci\JWT\Parser;

/**
 * Class Auth
 * @package App
 */
class Auth
{

    /**
     * @return bool
     */
    public static function checkIfLoggedIn(): bool
    {
        if (!empty($_COOKIE['access_token'])) {
            $parsedToken = (new Parser())->parse((string) $_COOKIE['access_token']);
        }

        if (!empty($parsedToken)) {
            $validationData = new \Lcobucci\JWT\ValidationData(); // It will use the current time to validate (iat, nbf and exp)
            $validationData->setAudience($parsedToken->getClaim('aud'));
            $validationData->setIssuer($parsedToken->getClaim('iss'));
            $validationData->setId($parsedToken->getHeader('jti'));
            $parsedToken->validate($validationData);
            return true;
        }
        return false;
    }

}