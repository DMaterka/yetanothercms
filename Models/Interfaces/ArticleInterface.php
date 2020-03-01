<?php


namespace Models\Interfaces;

/**
 * Interface ArticleInterface
 * @package Models\Interfaces
 */
interface ArticleInterface
{
    CONST TABLE = 'articles';
    CONST ID = 'ID';
    CONST TITLE = 'title';
    CONST INTRO = 'intro';
    CONST CONTENT = 'content';

    /**
     * @return int
     */
    public function getId(): int;


    public function setId(int $id): self;

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle(string $title): self;

    /**
     * @return string
     */
    public function getTitle(): string ;

    /**
     * @param string $intro
     * @return $this
     */
    public function setIntro(string $intro): self;

    /**
     * @return string
     */
    public function getIntro(): string ;

    /**
     * @param string $content
     * @return $this
     */
    public function setContent(string $content): self;

    /**
     * @return string
     */
    public function getContent(): string;
}