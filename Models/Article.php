<?php

namespace Models;

use Models\Interfaces\ArticleInterface;

class Article extends AbstractModel implements ArticleInterface
{
    /**
     * @var int $id
     */
    protected $id;

    /**
     * @var string $title
     */
    protected $title;

    /**
     * @var string $content
     */
    protected $content;

    /**
     * @var string $intro
     */
    protected $intro;

    /**
     * @param $id
     * @return $this
     */
    public function setId(int $id): ArticleInterface
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
     * @param string $title
     * @return $this
     */
    public function setTitle(string $title): ArticleInterface
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return int|string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getIntro(): string
    {
        return $this->intro;
    }

    /**
     * @param string $content
     * @return $this|ArticleInterface
     */
    public function setContent(string $content): ArticleInterface
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return int|mixed
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $intro
     * @return ArticleInterface
     */
    public function setIntro(string $intro): ArticleInterface
    {
        $this->intro = $intro;
        return $this;
    }
}