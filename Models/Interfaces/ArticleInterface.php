<?php


namespace Models\Interfaces;


interface ArticleInterface
{

    public function getId();


    public function setId(int $id);

    /**
     * @param $id
     * @return $this
     */
    public function setTitle(string $email): self;

    /**
     * @return int
     */
    public function getTitle();

    /**
     * @param string $password
     * @return $this
     */
    public function setContent(string $password);

    /**
     * @return int
     */
    public function getContent();
}