<?php

use Symfony\Component\Dotenv\Dotenv;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

require __DIR__ . '/../vendor/autoload.php';
$dotenv = new Dotenv();
$dotenv->load(__DIR__.'/../.env');

$request = Request::createFromGlobals();

//todo filter & validate
$pageVariable = $request->query->get('page', 'index');

$actionVariable = $request->query->get('action', 'show');

$paramsVariable = $request->query->get('params', null);

$controllerName = 'Controllers\\' . ucfirst($pageVariable) . 'Controller';

if (!class_exists($controllerName)) {
    require_once '../Views/404.php';
    exit();
}

$controller = new $controllerName();
$response = $controller->{$actionVariable}($request);

if ($response instanceof Response) {
    $response->send();
}
