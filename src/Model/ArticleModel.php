<?php

declare(strict_types=1);
namespace App\Model;

use App\Services\DatabaseService;
use PDO;

class ArticleModel
{
    private DatabaseService $database;

    public function __construct()
    {
        $this->database = DatabaseService::getInstance();
    }

    public function getAllArticles(): bool|array
    {
            return $this->database->getPdo()->query('SELECT * FROM article', PDO::FETCH_CLASS, ArticleModel::class)->fetchAll();
    }
    public function getArticlesByNumber(int $numberOfArticles)
    {
        return $this->database->getPdo()->query("SELECT * FROM article LIMIT $numberOfArticles", PDO::FETCH_CLASS, ArticleModel::class)->fetchAll();
    }
    public function getArticleById(int $idArticle)
    {
        return $this->database->getPdo()->query("SELECT * FROM article WHERE id = $idArticle", PDO::FETCH_CLASS, ArticleModel::class)->fetch();
    }
}