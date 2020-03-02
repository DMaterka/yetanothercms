<?php

namespace Controllers;

use Models\Interfaces\ArticleInterface;

/**
 * Class Article
 * @package Controllers
 */
class Article extends AbstractController
{
    /**
     * @param $params
     * @return mixed|void
     * @throws \ReflectionException
     */
    public function show(array $params)
    {
        $article = \Models\Article::fetch($params['id']);
        $params['article'] = $article->toArray();
        /** @view ../Views/index.php */
        return $this->render('article', $params);
    }

    /**
     * @param $params
     * @return mixed|void
     */
    public function addArticle($params)
    {
        return $this->render('addArticle', $params);
    }

    /**
     * @param $params
     * @throws \ReflectionException
     */
    public function store($params)
    {
        $article = (new \Models\Article())
            ->setTitle($params['title'])
            ->setIntro($params['intro'])
            ->setContent($params['content']);
        $article->save();
        header('location: /');
    }
}