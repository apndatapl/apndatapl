<?php
require __DIR__ . '/../vendor/autoload.php';

use Psr\Http\Message\ServerRequestInterface as Request;
use Dotenv\Dotenv;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Factory\AppFactory;
use Illuminate\Database\Capsule\Manager as Capsule;
use Smarty;

$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$app = AppFactory::create();

$capsule = new Capsule;
$capsule->addConnection([
    'driver' => 'mysql',
    'host' => $_ENV['DB_HOST'],
    'database' => $_ENV['DB_DATABASE'],
    'username' => $_ENV['DB_USERNAME'],
    'password' => $_ENV['DB_PASSWORD'],
    'charset' => 'utf8mb4',
    'collation' => 'utf8mb4_unicode_ci',
    'prefix' => '',
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();

function render(string $template, array $data = []): string
{
    static $smarty = null;
    if ($smarty === null) {
        $smarty = new Smarty();
        $smarty->setTemplateDir(__DIR__ . '/../views');
        $compileDir = __DIR__ . '/../storage/smarty';
        if (!is_dir($compileDir)) {
            mkdir($compileDir, 0777, true);
        }
        $smarty->setCompileDir($compileDir);
    }
    foreach ($data as $k => $v) {
        $smarty->assign($k, $v);
    }
    return $smarty->fetch($template);
}

(require __DIR__ . '/../src/routes.php')($app);

$app->run();
