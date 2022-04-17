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
    public function countTotalArticles(): null|int
    {
        $query = "SELECT COUNT(*) as total FROM article";
        $result = $this->database->getPdo()->query($query)->fetchObject();
        if ($result === false) {
            return null;
        }
        return $result->total;
    }
    public function countTotalPendingArticles(): null|int
    {
        $query = "SELECT COUNT(*) as total FROM article WHERE status = 1";
        $result = $this->database->getPdo()->query($query)->fetchObject();
        if ($result === false) {
            return null;
        }
        return $result->total;
    }
}
