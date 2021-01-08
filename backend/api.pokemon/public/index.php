<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\pokemon\src\Action\PokemonController;

require __DIR__ . './../vendor/autoload.php';

$app = \DI\Bridge\Slim\Bridge::create();


$app->get('/pokemon/{id}[/]', function (Request $request, Response $response, $id, PokemonController $pokemonController) {
    return $pokemonController->findById($request, $response, $id);
});

$app->get('/search', function (Request $request, Response $response, PokemonController $pokemonController) {
    return $pokemonController->getQueryParams($request, $response);
});

$app->run();