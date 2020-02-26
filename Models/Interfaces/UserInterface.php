<?php


namespace Models\Interfaces;


interface UserInterface
{
    public function getId();

    /**
     * @param $id
     * @return $this
     */
    public function setEmail(string $email): self;

    /**
     * @return int
     */
    public function getEmail();

    /**
     * @param string $password
     * @return $this
     */
    public function setPassword(string $password);

    /**
     * @return int
     */
    public function getPassword();
}