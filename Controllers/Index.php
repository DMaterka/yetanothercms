<?php

namespace Controllers;

/**
 * Class Index
 * @package Controllers
 */
class Index extends AbstractController {

    /**
     * @param $params
     * @return mixed|void
     */
    public function show($params) {

        //mockup
        //todo get from database
        $params['articles'] = [['title' => 'title', 'content' => 'content']];

        return $this->render('index', $params);
    }

}