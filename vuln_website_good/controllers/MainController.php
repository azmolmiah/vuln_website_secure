<?php

namespace app\controllers;

use app\Router;
// use app\controllers\CartController;

class MainController
{
    public static $cart;
    public static $count;
    public static $total = 0;
    public static $cartProducts = array();

    public static function getCartProducts($router)
    {
        session_start();

        self::$cart = $_SESSION['cart'] ?? [];
        self::$count = count(self::$cart);

        foreach (self::$cart as $key => $value) {
            array_push(self::$cartProducts, $router->db->getCartProducts($key) + $value);
        }

        foreach (self::$cartProducts as $cartProduct) {
            self::$total += $cartProduct['price'] * $cartProduct['quantity'];
        }
    }

    public static function index(Router $router)
    {
        self::getCartProducts($router);

        $products = $router->db->getFeaturedProducts();
        $router->renderView('index', [
            'products' => $products,
            'count' => self::$count,
            'total' => self::$total,
            'cartProducts' => self::$cartProducts
        ]);
    }

    public static function products(Router $router)
    {
        $search = $_GET['search'] ?? '';
        $category = $_GET['cat_id'] ?? '';

        self::getCartProducts($router);

        $queryAndResult = $router->db->getAllProducts($search, $category);
        $categories = $router->db->getCategories();
        $router->renderView('products', [
            'products' => $queryAndResult['products'],
            'query' => $queryAndResult['query'],
            'search' => $search,
            'categories' => $categories,
            'count' => self::$count,
            'total' => self::$total,
            'cartProducts' => self::$cartProducts
        ]);
    }

    public static function product(Router $router)
    {
        $id = $_GET['id'] ?? null;

        $product =  $router->db->getSingleProduct($id);

        self::getCartProducts($router);

        $router->renderView('product', [
            'product' => $product[0],
            'total' => self::$total,
            'count' => self::$count,
            'cartProducts' => self::$cartProducts
        ]);
    }

    public static function login(Router $router)
    {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
        $message = '';

        $isLoggedIn = $router->db->login($username, $password);

        // if ($isLoggedIn) {
        //     $_SESSION['customer'] = $username;
        //     $_SESSION['customerId'] = $isLoggedIn['id'];

        // } else {
        //     $message = 'The username or password is incorrect!';
        // }

        $router->renderView('login', [
            'message' => $message,
            'isLoggedIn' => $isLoggedIn
        ]);
    }

    public static function register()
    {
        echo 'Register Page';
    }

    public static function cart(Router $router)
    {
        self::getCartProducts($router);

        $router->renderView('cart', [
            'cart' => self::$cart,
            'count' => self::$count,
            'cartProducts' => self::$cartProducts,
            'total' => self::$total
        ]);
    }

    public static function admin()
    {
        echo 'Admin Page';
    }
}
