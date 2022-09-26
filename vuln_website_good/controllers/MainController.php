<?php

namespace app\controllers;

use app\Router;
use app\controllers\CartController;
use app\controllers\AuthController;

class MainController
{
    public static function index(Router $router)
    {
        CartController::getCartProducts($router);

        $products = $router->db->getFeaturedProducts();

        $router->renderView('index', [
            'products' => $products,
            'count' => CartController::$count,
            'total' => CartController::$total,
            'cartProducts' => CartController::$cartProducts
        ]);
    }

    public static function products(Router $router)
    {
        CartController::getCartProducts($router);

        $search = $_GET['search'] ?? '';
        $category = $_GET['cat_id'] ?? '';
        $queryAndResult = $router->db->getAllProducts($search, $category);
        $categories = $router->db->getCategories();

        $router->renderView('products', [
            'products' => $queryAndResult['products'],
            'query' => $queryAndResult['query'],
            'search' => $search,
            'categories' => $categories,
            'count' => CartController::$count,
            'total' => CartController::$total,
            'cartProducts' => CartController::$cartProducts
        ]);
    }

    public static function product(Router $router)
    {
        CartController::getCartProducts($router);

        $id = $_GET['id'] ?? null;
        $product =  $router->db->getSingleProduct($id);

        $router->renderView('product', [
            'product' => $product[0],
            'total' => CartController::$total,
            'count' => CartController::$count,
            'cartProducts' => CartController::$cartProducts
        ]);
    }

    public static function login(Router $router)
    {
        CartController::getCartProducts($router);

        // if (AuthController::$loggedInUser) {
        //     $_SESSION['customer'] = AuthController::$username;
        //     $_SESSION['customerId'] = AuthController::$loggedInUser[0]['id'];


        //     if (isset($_GET['redirect']) && $_GET['redirect'] == 'docs') {
        //         // Login redirect to the documentation
        //         header('Location: /docs');
        //     } elseif (isset($_GET['redirect']) && $_GET['redirect'] == 'checkout') {
        //         // Login redirect to the checkout
        //         header('Location:/checkout');
        //     } else {
        //         header('Location: /myaccount');
        //     }
        // } else {
        //     AuthController::$message = 'The username or password is incorrect!';
        // }

        $router->renderView('login', [
            'message' => AuthController::$message,
            'total' => CartController::$total,
            'count' => CartController::$count,
            'cartProducts' => CartController::$cartProducts
        ]);
    }

    public static function register(Router $router)
    {
        CartController::getCartProducts($router);

        $router->renderView('register', [
            'total' => CartController::$total,
            'count' => CartController::$count,
            'cartProducts' => CartController::$cartProducts
        ]);
    }

    public static function cart(Router $router)
    {
        CartController::getCartProducts($router);

        $router->renderView('cart', [
            'cart' => CartController::$cart,
            'count' => CartController::$count,
            'cartProducts' => CartController::$cartProducts,
            'total' => CartController::$total
        ]);
    }

    public static function checkout()
    {
        echo 'Checkout Page';
    }

    public static function admin()
    {
        echo 'Admin Page';
    }
}
