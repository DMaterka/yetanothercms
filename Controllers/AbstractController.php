<?php

namespace Controllers;

use Controllers\Interfaces\ControllerInterface;

/**
 * Class AbstractController
 * @package Controllers
 */
abstract class AbstractController implements ControllerInterface {
    /**
     * @param $template
     * @param $params
     * @return mixed|void
     */
    public function render($template, $params)
    {
        ob_start();
        include_once '../Views/' . $template . '.php';
        //content shown on the rendered view
        $mainContent = ob_get_contents();
        ob_end_clean();
        include_once '../Views/layout/layout.php';
    }

}