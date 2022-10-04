<?php

namespace app\controllers;

use app\Router;

class AuthController
{
    public static $message = '';
    public static $username;
    public static $password;

    public static function auth(Router $router)
    {
        session_start();

        self::$username = $_POST['username'] ?? null;
        self::$password = $_POST['password'] ?? null;

        $loggedInUser = $router->db->login(self::$username, self::$password);

        if ($loggedInUser) {
            $_SESSION['customer'] = self::$username;
            $_SESSION['customerId'] = $loggedInUser[0]['id'];

            // Redirect
            if (isset($_GET['redirect']) && $_GET['redirect'] == 'docs') {
                // Login redirect to the documentation
                header('Location: /docs');
                exit;
            } elseif (isset($_GET['redirect']) && $_GET['redirect'] == 'checkout') {
                // Login redirect to the checkout
                header('Location: /checkout');
                exit;
            } else {
                header('Location: /myaccount');
                exit;
            }
        } else {
            header('Location: /login');
            exit;
        }
    }
}
