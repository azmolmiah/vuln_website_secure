<?php

require_once __DIR__ . '/../vendor/autoload.php';

use app\Router;
use app\controllers\MainController;

$router = new Router();

$router->get('/',  [MainController::class, 'index']);
$router->get('/products',  [MainController::class, 'products']);
$router->get('/login',  [MainController::class, 'login']);
$router->get('/register',  [MainController::class, 'register']);
$router->get('/admin', MainController::class, 'admin');

$router->resolve();
