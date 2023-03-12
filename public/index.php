<?php
session_start();
require_once __DIR__ . "/../vendor/autoload.php";
use Dotenv\Dotenv;
use App\Core\Router;
use App\Controllers\BookmarksController;
use App\Controllers\UserController;
use App\Controllers\AuthController;


$dotenv = Dotenv::createImmutable(__DIR__."./..");
$dotenv->load();
define("DBHOST", $_ENV["DBHOST"]);
define("DBUSER", $_ENV["DBUSER"]);
define("DBPASS", $_ENV["DBPASS"]);
define("DBNAME", $_ENV["DBNAME"]);
define("DBPORT", $_ENV["DBPORT"]);


$router = new Router();
$router->add(array(
    'name' => 'home',
    'path' => '/^\/$/',
    'action' => [AuthController::class, 'AuthLoginAction']
));

$router->add(array(
    'name' => 'home',
    'path' => '/^\/bookmarks$/',
    'action' => [BookmarksController::class, 'GetAllAction']
));

$router->add(array(
    'name' => 'home',
    'path' => '/^\/bookmarks\/edit\/\d{0,3}$/',
    'action' => [BookmarksController::class, 'EditAction']
));

$router->add(array(
    'name' => 'home',
    'path' => '/^\/logout$/',
    'action' => [AuthController::class, 'AuthLogoutAction']
));


$request = $_SERVER['REQUEST_URI'];
$route = $router->match($request);
if ($route) {
    $controllerName = $route['action'][0];
    $actionName = $route['action'][1];
    $controller = new $controllerName;
    $controller->$actionName($request);
} else {
    echo "No route";
}