<?php
namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Models\Equipment;

class EquipmentController
{
    public function index(Request $request, Response $response): Response
    {
        $items = Equipment::all();
        $response->getBody()->write($items->toJson());
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function store(Request $request, Response $response): Response
    {
        $data = $request->getParsedBody();
        $item = Equipment::create($data);
        $response->getBody()->write($item->toJson());
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function show(Request $request, Response $response, array $args): Response
    {
        $item = Equipment::find($args['id']);
        if (!$item) {
            return $response->withStatus(404);
        }
        $response->getBody()->write($item->toJson());
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function update(Request $request, Response $response, array $args): Response
    {
        $item = Equipment::find($args['id']);
        if (!$item) {
            return $response->withStatus(404);
        }
        $data = $request->getParsedBody();
        $item->fill($data);
        $item->save();
        $response->getBody()->write($item->toJson());
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function delete(Request $request, Response $response, array $args): Response
    {
        $item = Equipment::find($args['id']);
        if ($item) {
            $item->delete();
        }
        return $response->withStatus(204);
    }
}
