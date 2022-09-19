<?php

namespace app\controllers;

use app\Router;


class CartController
{
    public $total;
    public $cart;
    public $count;

    public static function addToCart()
    {
        session_start();

        $id = $_GET['id'] ?? null;
        $quantity = $_GET['quantity'] ?? null;

        // if (isset($_GET['id'])) {
        if ($id) {

            // if (isset($_GET['quantity'])) {
            if ($quantity) {
                $quantity = $quantity;
            } else {
                $quantity = 1;
            }
            // $id = $_GET['id'];

            $_SESSION['cart'][$id] = array('quantity' => $quantity);

            echo '<pre>';
            var_dump($_SESSION['cart'] ?? null);
            echo '</pre>';

            exit;

            header('Location: /cart');
        }
    }
}
