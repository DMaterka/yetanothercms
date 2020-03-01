<?php

namespace Controllers;

use Models\Article;

/**
 * Class Index
 * @package Controllers
 */
class Index extends AbstractController {

    /**
     * @param $params
     * @return mixed|void
     * @throws \ReflectionException
     */
    public function show($params)
    {
        //mockup
        //todo get from database

        $article = Article::fetch(1);

        //todo seed db for demo

        $params['articles'] = [$article->toArray()];

        /** @file ../Views/index.php */
        return $this->render('index', $params);
    }

}