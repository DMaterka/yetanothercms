<?php

namespace Controllers;

use Models\Article;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints\Collection;
use Symfony\Component\Validator\Constraints\Type;

/**
 * Class Article
 * @package Controllers
 */
class ArticleController extends AbstractController
{
    /**
     * @param $params
     * @return mixed|void
     * @throws \ReflectionException
     */
    public function show(Request $request)
    {
        $article = Article::fetch($request->query->get('params')['id']);
        $params['article'] = $article->toArray();
        /** @view ../Views/article.php */
        return $this->render('article', $params);
    }

    /**
     * @param $params
     * @return mixed|void
     */
    public function addArticle(Request $params)
    {
        return $this->render('addArticle', $params);
    }

    /**
     * @param Request $request
     * @return mixed|void
     * @throws \ReflectionException
     */
    public function showUpdateForm(Request $request)
    {
        $article = Article::fetch($request->query->get('params')['id']);
        $params['article'] = $article->toArray();
        return $this->render('editArticle', $params);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws \ReflectionException
     */
    public function store(Request $request): RedirectResponse
    {
        $rules = new Collection([
            'params' => new Collection([
                'title' => [
                    new Type('string')
                ],
                'intro' => [
                    new Type('string')
                ],
                'content' => [
                    new Type('string')
                ]
            ])
        ]);

        $this->validator->validate($request, $rules);
        $article = (new Article())
            ->setTitle($request->request->get('params')['title'])
            ->setIntro($request->request->get('params')['intro'])
            ->setContent($request->request->get('params')['content']);
        $article->save();
        return (new RedirectResponse('/'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws \ReflectionException
     */
    public function delete(Request $request): Response
    {
        $rules = new Collection([
            'params' => new Collection([
                'id' => [
                    new Type('integer')
                ]
            ])
        ]);
        $this->validator->validate($request, $rules);

        Article::delete($request->query->get('params')['id']);

        return new RedirectResponse('/');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws \ReflectionException
     */
    public function update(Request $request): RedirectResponse
    {
        $rules = new Collection([
            'id' => [
                new Type('integer')
            ],
            'title' => [
                new Type('string')
            ],
            'intro' => [
                new Type('string')
            ],
            'content' => [
                new Type('string')
            ]
        ]);

        $this->validator->validate($request, $rules);

        $article = (new Article())->setTitle($request->request->get('params')['title'])
            ->setIntro($request->request->get('params')['intro'])
            ->setContent($request->request->get('params')['content']);
        $article->update($request->request->get('params')['id']);

        return (new RedirectResponse('/'));
    }
}
