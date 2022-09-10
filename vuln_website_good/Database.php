<?php

namespace app;

use PDO;

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
        $statement = $this->pdo->prepare('SELECT * FROM products ORDER BY created_at DESC LIMIT 4');
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllProducts($search = '')
    {
        $queryAndResults = ['query' => '', 'products' => ''];
        if ($search) {
            $statement = $this->pdo->prepare('SELECT * FROM products WHERE title LIKE :title OR description LIKE :description');
            $statement->bindValue(':title', "%$search%");
            $statement->bindValue(':description', "%$search%");
            $queryAndResults['query'] = "SELECT * FROM products WHERE title LIKE $search OR description LIKE $search";
        } else {
            $statement = $this->pdo->prepare('SELECT * FROM products');
            $queryAndResults['query'] = 'SELECT * FROM products';
        }

        $statement->execute();
        $queryAndResults['products'] = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $queryAndResults;
    }
}
