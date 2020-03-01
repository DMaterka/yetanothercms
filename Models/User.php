<?php

namespace Models;

use Models\Interfaces\UserInterface;

class User extends AbstractModel implements UserInterface
{
    /**
     * @var int $id
     */
    protected $id;

    /**
     * @var string $password
     */
    protected $password;

    /**
     * @var string $email
     */
    protected $email;

    /**
     * @param $id
     * @return $this
     */
    public function setId(int $id): UserInterface
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param string $email
     * @return $this
     */
    public function setEmail(string $email): UserInterface
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $password
     * @return $this
     */
    public function setPassword(string $password): UserInterface
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

}