<?php

namespace app\controllers;

use app\Router;

class MainController
{
    public static function index(Router $router)
    {

        $products = $router->db->getFeaturedProducts();
        // echo '<pre>';
        // var_dump($featuredProducts);
        // echo '</pre>';
        $router->renderView('index', [
            'products' => $products
        ]);
    }

    public static function products(Router $router)
    {
        $search = $_GET['search'] ?? '';
        $queryAndResult = $router->db->getAllProducts($search);
        $router->renderView('products', [
            'products' => $queryAndResult['products'],
            'query' => $queryAndResult['query'],
            'search' => $search
        ]);
    }

    public static function login()
    {
        echo 'Login Page';
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
