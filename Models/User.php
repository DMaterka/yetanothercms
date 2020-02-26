<?php

namespace Models;

use Models\Interfaces\UserInterface;

class User implements UserInterface
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
    public function setId(int $id) {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @param $id
     * @return $this
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return int
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * @param string $password
     * @return $this
     */
    public function setPassword(string $password) {
        $this->password = $password;
        return $this;
    }

    /**
     * @return int
     */
    public function getPassword() {
        return $this->password;
    }

}