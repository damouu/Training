<?php

namespace App\pokemon\src\Action;
error_reporting(0);

use JsonException;
use MongoDB\Client;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


class PokemonController
{
    protected ContainerInterface $container;

    protected const MONGO_POKEMON = "mongodb://pokemon";


    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function findById(Response $response, Request $request, $args): Response
    {
        $c = new Client(self::MONGO_POKEMON);
        $pokemon = $c->selectDatabase('pokemon')
            ->selectCollection('pokemons')
            ->findOne(
                ['id' => $args['id']],
                ['projection' => ['id' => 1, 'img' => 1, 'name' => 1]]);
        try {
            $response->withStatus(200)
                ->withHeader('Content-Type', 'application/json')
                ->getBody()->write(json_encode($pokemon, JSON_THROW_ON_ERROR));
        } catch (JsonException $e) {
            die($e->getMessage());
        }
        return $response;
    }

}