<?php

namespace Controllers;

use Controllers\Interfaces\ControllerInterface;

/**
 * Class AbstractController
 * @package Controllers
 */
class AbstractController implements ControllerInterface {

    /**
     * @param $template
     * @param $params
     * @return mixed|void
     */
    public function render($template, $params) {
        ob_start();
        include( '../Views/' . $template . '.php');
        //content shown on the rendered view
        $mainContent = ob_get_contents();
        ob_end_clean();
        require_once '../Views/layout.php';
    }

}