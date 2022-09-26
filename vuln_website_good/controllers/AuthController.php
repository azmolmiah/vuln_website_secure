<?php

namespace app\controllers;

use app\Router;

class AuthController
{
    public static $message = '';

    public static function validateLogin(Router $router)
    {
        $username = $_POST['username'] ?? null;
        $password = $_POST['password'] ?? null;

        $loggedInUser = $router->db->login($username, $password);

        if ($loggedInUser) {
            $_SESSION['customer'] = $username;
            $_SESSION['customerId'] = $loggedInUser[0]['id'];
            header('Location: /checkout');
            exit;
        } else {
            if ($username === '' && $password === '') {
                self::$message = 'Please enter your username and password';
            } else if ($username === '') {
                self::$message = 'Please enter your username';
            } elseif ($password === '') {
                self::$message = 'Please enter your password';
            }
            header('Location: /login');
            exit;
        }
    }
}
