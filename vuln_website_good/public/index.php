<?php

require_once __DIR__ . '/../vendor/autoload.php';

use app\Router;
use app\controllers\MainController;
use app\controllers\CartController;
use app\controllers\AuthController;

$router = new Router();

// Public pages controllers
$router->get('/',  [MainController::class, 'index']);
$router->get('/products',  [MainController::class, 'products']);
$router->get('/product',  [MainController::class, 'product']);
$router->get('/login',  [MainController::class, 'login']);
$router->get('/register',  [MainController::class, 'register']);
$router->get('/cart', [MainController::class, 'cart']);
$router->get('/admin', [MainController::class, 'admin']);

// Private pages controllers
$router->get('/checkout', [MainController::class, 'checkout']);

// Actions controllers
$router->get('/add-to-cart', [CartController::class, 'addToCart']);
$router->post('/auth', [AuthController::class, 'validateLogin']);


$router->resolve();
