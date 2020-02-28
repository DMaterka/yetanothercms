<?php
require __DIR__ . '/../vendor/autoload.php';
$dotenv = new \Symfony\Component\Dotenv\Dotenv();
$dotenv->load(__DIR__.'/../.env');

//todo filter & validate
$pageVariable = !empty($_REQUEST['page']) ? $_REQUEST['page'] : null;

if (empty($pageVariable)) {
    $pageVariable = 'index';
}

$actionVariable = !empty($_REQUEST['action']) ? $_REQUEST['action'] : null;
if (empty($actionVariable)) {
    $actionVariable = 'show';
}
$paramsVariable = !empty($_REQUEST['params']) ? $_REQUEST['params'] : null;

$controllerName = 'Controllers\\' . ucfirst($pageVariable);

if (!class_exists($controllerName)){
    require_once '../Views/404.php';
    exit();
}

$controller = new $controllerName();
$controller->{$actionVariable}($paramsVariable);


