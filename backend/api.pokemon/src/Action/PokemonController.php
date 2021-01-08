<?php

namespace App\pokemon\src\Action;

use MongoDB\Client;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


class PokemonController
{
    protected $Mongoclient;

    public function __construct(Client $Mongoclient)
    {
        $this->Mongoclient = new $Mongoclient('mongodb://pokemon');
    }


    public function findById(Request $request, Response $response, $id): Response
    {
        $pokemon = $this->Mongoclient->selectDatabase('pokemon')
            ->selectCollection('pokemons')
            ->findOne(
                ['id' => $id],
                ['projection' => ['id' => 1, 'img' => 1, 'name' => 1]]);
        $response->withStatus(200)
            ->withHeader('Content-Type', 'application/json')
            ->getBody()->write(json_encode($pokemon, JSON_THROW_ON_ERROR));
        return $response;
    }

    public function getQueryParams(Request $request, Response $response): Response
    {
        //dede dkemed
        $getQueryParams = $request->getQueryParams();
        $keysGetQueryParams = array_keys($getQueryParams);
        foreach ($keysGetQueryParams as $key) {
            $pokemons = $this->Mongoclient
                ->selectDatabase('pokemon')
                ->selectCollection('pokemons')
                ->find([$key => ucfirst($getQueryParams[$key])],
                    ['limit' => 10, 'projection' => ['id' => 1, 'img' => 1, 'name' => 1]]);

        }
        foreach ($pokemons as $pokemon) {
            $data["data"][] = $pokemon;
        }
        $response->withStatus(200)
            ->withHeader('Content-Type', 'application/json')
            ->getBody()->write(json_encode(($data), JSON_THROW_ON_ERROR));
        return $response;
    }

}