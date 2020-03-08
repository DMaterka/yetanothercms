<?php

namespace Controllers;

use Controllers\Interfaces\ControllerInterface;
use Database\DBCreator;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Class AbstractController
 * @package Controllers
 * @author Daniel Materka <daniel.materka@gmail.com>
 */
abstract class AbstractController implements ControllerInterface
{
    /**
     * @var ValidatorInterface $validator
     */
    protected $validator;

    /**
     * @var \PDO $dbConn
     */
    protected $dbConn;

    /**
     * AbstractController constructor.
     */
    public function __construct()
    {
        $this->validator = Validation::createValidator();
        $this->dbConn = (new DBCreator())->create()->getInstance();
    }

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