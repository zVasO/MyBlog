<?php

declare(strict_types=1);

namespace App\Model;

use App\Services\DatabaseService;
use DateTime;
use PDO;

class CommentModel
{

    private DatabaseService $database;

    public function __construct()
    {
        $this->database = DatabaseService::getInstance();
    }

    public function getAllComments()
    {
        return $this->database->getPdo()->query('SELECT * FROM comment', PDO::FETCH_CLASS, CommentModel::class)->fetchAll();
    }

    public function getAllPublishedCommentByArticleId(int $id): array
    {
        $result = $this->database->getPdo()
            ->query("SELECT comment.* FROM comment, article WHERE article.id = $id AND comment.article_id = $id AND comment.status = 'published'",
                PDO::FETCH_CLASS,
                CommentModel::class
            )->fetchAll();
        if ($result === false) {
            return [];
        }
        return $result;
    }

    public function getNumberOfCommentsByArticle(int $id): int
    {
        $query = "SELECT count(*) as number FROM `comment`, `article` WHERE article.id = $id AND comment.article_id = $id AND comment.status = 'published'";
        $result = $this->database->getPdo()->query($query, PDO::FETCH_CLASS, CommentModel::class)->fetchObject();
        if ($result === false) {
            return 0;
        }
        return $result->number;
    }

    public function addComment(int $articleId, string $comment, int $status, int $userId): void
    {
        $this->database->getPdo()->query("INSERT INTO comment (content, User_id, status, article_id, createdAt) VALUES ('" . $comment . "', '" . $userId . "', '" . $status . "', '" . $articleId . "' , NOW())");
    }

    private function getPdo(): PDO
    {
        return $this->database->getPdo();
    }
}
