<?php

require_once __DIR__ . '/../vendor/autoload.php';

use app\Router;
use app\controllers\MainController;

$router = new Router();

$router->get('/',  [MainController::class, 'indexPage']);
$router->get('/products',  [MainController::class, 'productsPage']);
$router->get('/login',  [MainController::class, 'loginPage']);
$router->get('/register',  [MainController::class, 'registerPage']);

$router->resolve();
