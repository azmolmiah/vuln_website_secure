<?php

namespace app\controllers;

use app\Router;
// use app\controllers\CartController;

class MainController
{
    public static function index(Router $router)
    {
        $products = $router->db->getFeaturedProducts();
        $router->renderView('index', [
            'products' => $products
        ]);
    }

    public static function products(Router $router)
    {
        $search = $_GET['search'] ?? '';
        $category = $_GET['cat_id'] ?? '';

        $queryAndResult = $router->db->getAllProducts($search, $category);
        $categories = $router->db->getCategories();
        $router->renderView('products', [
            'products' => $queryAndResult['products'],
            'query' => $queryAndResult['query'],
            'search' => $search,
            'categories' => $categories
        ]);
    }

    public static function product(Router $router)
    {
        $id = $_GET['id'] ?? null;

        $product =  $router->db->getSingleProduct($id);

        $router->renderView('product', [
            'product' => $product[0]
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
        session_start();
        $cart = $_SESSION['cart'] ?? null;
        $count = $cart ? count($cart) : 0;
        $total = 0;

        $cartProducts = array();

        foreach ($cart as $key => $value) {
            array_push($cartProducts, $router->db->getCartProducts($key) + $value);
        }

        $router->renderView('cart', [
            'cart' => $cart,
            'count' => $count,
            'products' => $cartProducts,
            'total' => $total
        ]);
    }

    public static function admin()
    {
        echo 'Admin Page';
    }
}
