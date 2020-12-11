<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use DI\Container;


require __DIR__ . './../vendor/autoload.php';

$container = new Container();
AppFactory::setContainer($container);
$app = AppFactory::create();

$app->get('/', function (Request $request, Response $response, array $args) {
    $response->getBody()->write("Hello, dededede");
    return $response;
});

$app->get('/pokemon[/]', function (Request $request, Response $response, array $args) {
    return (new \App\pokemon\src\Action\PokemonController($this))->getByQueryParams($response, $request, $args);
});

$app->run();