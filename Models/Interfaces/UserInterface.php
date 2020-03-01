<?php


namespace Models\Interfaces;

/**
 * Interface UserInterface
 * @package Models\Interfaces
 */
interface UserInterface
{
    CONST TABLE = 'users';
    CONST ID = 'ID';
    CONST EMAIL = 'title';
    CONST PASSWORD = 'intro';

    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @param string $email
     * @return $this
     */
    public function setEmail(string $email): self;

    /**
     * @return string
     */
    public function getEmail(): string;

    /**
     * @param string $password
     * @return $this
     */
    public function setPassword(string $password): self;

    /**
     * @return string
     */
    public function getPassword(): string;
}