<?php
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\App;
use App\Controllers\EquipmentController;
use App\Controllers\EmployeeController;
use App\Controllers\LocationController;

return function (App $app) {
    $app->get('/', function(Request $req, Response $res) {
        $res->getBody()->write('Equipment Manager API');
        return $res;
    });

    $app->get('/equipment', [EquipmentController::class, 'index']);
    $app->post('/equipment', [EquipmentController::class, 'store']);
    $app->get('/equipment/{id}', [EquipmentController::class, 'show']);
    $app->put('/equipment/{id}', [EquipmentController::class, 'update']);
    $app->delete('/equipment/{id}', [EquipmentController::class, 'delete']);

    $app->get('/employees', [EmployeeController::class, 'index']);
    $app->get('/locations', [LocationController::class, 'index']);
};
