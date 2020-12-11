<?php

namespace App\pokemon\src\Action;

use MongoDB\Client;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


class PokemonController
{
    protected $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function getByQueryParams(Response $response, Request $request, $args): Response
    {
        $queryParams = $request->getQueryParams();
        try {
            $c = new Client("mongodb://pokemon");
            $pokemon = $c->selectDatabase('pokemon')
                ->selectCollection('pokemons')
                ->findOne(['id' => $queryParams['id']], ['projection' => ['name' => 1, 'type' => 1]]);
            $response->getBody()->write(json_encode($pokemon, JSON_THROW_ON_ERROR));
        } catch (\MongoConnectionException | \JsonException $e) {
            die('error connection with database');
        }
        return $response;
    }

}