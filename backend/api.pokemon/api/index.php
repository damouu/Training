<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . './../vendor/autoload.php';

$app = AppFactory::create();

$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hello world PERSONA 5!");
    return $response;
});

$app->get('/pokemon', function (Request $request, Response $response, $args) {
    $response->getBody()->write("pokemon");
    return $response;
});

$app->run();