<?php

namespace app\controllers;

class CartController
{
    public static $cart;
    public static $count;
    public static $total = 0;
    public static $cartProducts = array();

    // Move to cart controller
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

    public static function addToCart()
    {
        session_start();

        $id = $_GET['id'] ?? null;
        $quantity = $_GET['quantity'] ?? null;

        if ($id) {

            if ($quantity) {
                $quantity = $quantity;
            } else {
                $quantity = 1;
            }

            $_SESSION['cart'][$id] = array('quantity' => $quantity);

            header('Location: /cart');
        }
    }
}
