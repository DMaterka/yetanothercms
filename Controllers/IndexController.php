<?php

namespace Controllers;

use Models\Article;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class IndexController
 * @package Controllers
 */
class IndexController extends AbstractController
{
    /**
     * @param $params
     * @return mixed|void
     * @throws \ReflectionException
     */
    public function show(Request $request)
    {
        $articles = Article::fetch();
        /** @file ../Views/index.php */
        return $this->render('index', $articles);
    }

}