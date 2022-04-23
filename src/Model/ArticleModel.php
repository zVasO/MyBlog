<?php

declare(strict_types=1);

namespace App\Model;

use App\Entity\ArticleEntity;
use App\Services\DatabaseService;
use JetBrains\PhpStorm\Pure;
use PDO;

class ArticleModel
{
    private DatabaseService $database;

    public function __construct()
    {
        $this->database = DatabaseService::getInstance();
    }

    /**
     * @return bool|array|null
     */
    public function getAllArticles(): bool|array|null
    {
        $query = 'SELECT * FROM article';
        $result = $this->getPdo()->query($query, PDO::FETCH_CLASS, ArticleEntity::class)->fetchAll();
        if ($result === false) {
            return null;
        }
        return $result;
    }

    /**
     * @param int $numberOfArticles
     * @return array|null
     */
    public function getArticlesByNumber(int $numberOfArticles): array|null
    {
        $query = "SELECT * FROM article LIMIT $numberOfArticles";
        $result = $this->getPdo()->query($query, PDO::FETCH_CLASS, ArticleEntity::class)->fetchAll();
        if ($result === false) {
            return null;
        }
        return $result;
    }

    #[Pure] private function getPdo(): PDO
    {
        return $this->database->getPdo();
    }

    /**
     * @param int $idArticle
     * @return mixed|null
     */
    public function getArticleById(int $idArticle): mixed
    {
        $query = "SELECT * FROM article WHERE id = $idArticle";
        $result = $this->getPdo()->query($query, PDO::FETCH_CLASS, ArticleEntity::class)->fetch();
        if ($result === false) {
            return null;
        }
        return $result;
    }

    /**
     * @return int|null
     */
    public function countTotalArticles(): null|int
    {
        $query = "SELECT COUNT(*) as total FROM article";
        $result = $this->database->getPdo()->query($query)->fetchObject();
        if ($result === false) {
            return null;
        }
        return $result->total;
    }

    /**
     * @return int|null
     */
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
