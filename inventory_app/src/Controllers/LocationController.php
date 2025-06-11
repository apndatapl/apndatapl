<?php
namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Models\Location;

class LocationController
{
    public function index(Request $request, Response $response): Response
    {
        $items = Location::all();
        $response->getBody()->write($items->toJson());
        return $response->withHeader('Content-Type', 'application/json');
    }
}
