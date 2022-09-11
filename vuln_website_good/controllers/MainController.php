<?php

namespace app\controllers;

use app\Router;

class MainController
{
    public static $cart;
    public static $total = 0;
    public static $count;
    public static $product;

    public function __construct(Router $router)
    {
        self::$cart = $_SESSION['cart'] ?? null;
        self::$count = count(self::$cart);

        foreach (self::$cart as $key => $value) {
            self::$product = $router->db->getCartProducts($key);
            self::$total += self::$product['price'] * $value['quantity'];
        }
    }

    public static function index(Router $router)
    {
        $products = $router->db->getFeaturedProducts();
        $router->renderView('index', [
            'products' => $products,
            'total' => self::$total,
            'count' => self::$count
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
            'categories' => $categories,
            'count' => self::$count,
            'total' => self::$total
        ]);
    }

    public static function product(Router $router)
    {
        $id = $_GET['id'] ?? null;
        $product =  $router->db->getSingleProduct($id);
        // echo '<pre>';
        // var_dump($product[0]);
        // echo '</pre>';
        $router->renderView('product', [
            'product' => $product[0],
            'count' => self::$count,
            'total' => self::$total
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
            'isLoggedIn' => $isLoggedIn,
            'count' => self::$count,
            'total' => self::$total
        ]);
    }

    public static function register()
    {
        echo 'Register Page';
    }

    public static function admin()
    {
        echo 'Admin Page';
    }
}
