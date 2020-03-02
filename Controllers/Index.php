<?php

namespace Controllers;

use Models\Article;

/**
 * Class Index
 * @package Controllers
 */
class Index extends AbstractController
{
    /**
     * @param $params
     * @return mixed|void
     * @throws \ReflectionException
     */
    public function show($params)
    {
        $articles = Article::fetch();
        $params['articles'] = $articles;

        /** @file ../Views/index.php */
        return $this->render('index', $params);
    }

}