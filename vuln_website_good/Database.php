<?php

namespace app;

use PDO;
use app\controllers\MainController;

class Database
{
    public \PDO $pdo;
    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;port=3306;dbname=level_two', 'root', '');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getFeaturedProducts()
    {
        $statement = $this->pdo->prepare('SELECT * FROM products ORDER BY created_at DESC LIMIT 3');
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllProducts($search = '', $category = '')
    {
        $queryAndResults = [
            'query' => '',
            'products' => ''
        ];

        if ($search) {
            $statement = $this->pdo->prepare('SELECT * FROM products WHERE title LIKE :title OR description LIKE :description');
            $statement->bindValue(':title', "%$search%");
            $statement->bindValue(':description', "%$search%");
            $queryAndResults['query'] = "SELECT * FROM products WHERE title LIKE $search OR description LIKE $search";
        } elseif ($category) {
            $statement = $this->pdo->prepare('SELECT * FROM products WHERE cat_id = :categoryId');
            $statement->bindValue(':categoryId', $category);
            $queryAndResults['query'] = "SELECT * FROM products WHERE cat_id = $category";
        } else {
            $statement = $this->pdo->prepare('SELECT * FROM products');
            $queryAndResults['query'] = 'SELECT * FROM products';
        }

        $statement->execute();
        $queryAndResults['products'] = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $queryAndResults;
    }

    public function getSingleProduct($id)
    {
        $statement = $this->pdo->prepare('SELECT * FROM products WHERE id = :id');
        $statement->bindValue(':id', $id);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCartProducts($key)
    {
        $statement = $this->pdo->prepare('SELECT * FROM products WHERE id = :key');
        $statement->bindValue(':key', $key);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC)[0];
    }

    public function getCategories()
    {
        $statement = $this->pdo->prepare('SELECT * FROM categories');
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function login($username, $password)
    {
        $statement = $this->pdo->prepare('SELECT * FROM customers WHERE username = :username AND password = :password LIMIT 1');
        $statement->bindValue(':username', $username);
        $statement->bindValue(':password', $password);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}
