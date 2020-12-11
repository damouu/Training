<?php

namespace App\pokemon\src\Action;

use MongoClient;
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

    public function nujabes(Response $response, Request $request, $args)
    {
        $c = new Client("mongodb://pokemon");
        $pokemon = $c->selectDatabase('pokemon')->selectCollection('pokemons')->findOne(['name' => 'Weedle']);
        try {
            $response->getBody()->write(json_encode($pokemon, JSON_THROW_ON_ERROR));
        } catch (\JsonException $e) {
        }
        return $response;
    }

}