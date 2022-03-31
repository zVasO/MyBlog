<?php

declare(strict_types=1);
namespace App\Model;

use App\Services\DatabaseService;

class Article
{
    private DatabaseService $database;

    public function __construct()
    {
        $this->database = DatabaseService::getInstance();
    }

    public function getAllArticles(): bool|array
    {
        return $this->database->getPdo()->query('SELECT * FROM article')->fetchAll();
    }
    public function getArticlesByNumber(int $numberOfArticles)
    {
        return $this->database->getPdo()->query("SELECT * FROM article LIMIT $numberOfArticles")->fetchAll();
    }
}