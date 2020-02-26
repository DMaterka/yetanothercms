<?php

namespace Controllers\Interfaces;

/**
 * Interface ControllerInterface
 * @package Controllers\Interfaces
 */
interface ControllerInterface {

    /**
     * @param $template
     * @param $params
     * @return mixed
     */
    public function render($template, $params);

}