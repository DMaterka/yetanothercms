<?php

namespace Models;

use Models\Interfaces\ArticleInterface;

class Article implements ArticleInterface
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
     * @param string $title
     * @return $this
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return int|string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $content
     * @return $this|ArticleInterface
     */
    public function setContent(string $content)
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return int|mixed
     */
    public function getContent()
    {
        return $this->content;
    }


}