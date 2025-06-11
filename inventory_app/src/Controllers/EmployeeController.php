<?php
namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Models\Employee;

class EmployeeController
{
    public function index(Request $request, Response $response): Response
    {
        $items = Employee::all();
        $response->getBody()->write($items->toJson());
        return $response->withHeader('Content-Type', 'application/json');
    }
}
