<?php

declare(strict_types=1);

namespace App\Model;

use App\Entity\CommentEntity;
use App\Services\DatabaseService;
use JetBrains\PhpStorm\Pure;
use PDO;

class CommentModel
{

    private DatabaseService $database;
    const STATUS_WAITING = 1;
    const STATUS_PUBLISHED = 2;
    const STATUS_HIDED = 1;

    public function __construct()
    {
        $this->database = DatabaseService::getInstance();
    }

    /**
     * @return array|false
     */
    public function getAllComments()
    {
        $query = 'SELECT * FROM comment';
        $result = $this->getPdo()
            ->query($query,
                PDO::FETCH_CLASS,
                CommentModel::class
            )->fetchAll();
        if ($result === false) {
            return [];
        }
        return $result;
    }

    /**
     * @param int $id
     * @return CommentEntity[]
     */
    public function getAllPublishedCommentByArticleId(int $id): array
    {
        $query = "SELECT comment.* FROM comment, article WHERE article.id = $id AND comment.article_id = $id AND comment.status = 'published'";
        $result = $this->database->getPdo()
            ->query($query,
                PDO::FETCH_CLASS,
                CommentEntity::class
            )->fetchAll();
        if ($result === false) {
            return [];
        }
        return $result;
    }

    /**
     * @param int $id
     * @return int
     */
    public function getNumberOfCommentsByArticle(int $id): int
    {
        $query = "SELECT count(*) as number FROM `comment`, `article` WHERE article.id = $id AND comment.article_id = $id AND comment.status = 'published'";
        $result = $this->getPdo()
            ->query($query,
                PDO::FETCH_CLASS,
                CommentEntity::class
            )->fetch();
        if ($result === false) {
            return 0;
        }
        return $result->number;
    }

    /**
     * @param int $articleId
     * @param string $comment
     * @param int $status
     * @param int $userId
     * @return void
     */
    public function addComment(int $articleId, string $comment, int $status, int $userId): void
    {
        $query = "INSERT INTO comment (content, User_id, status, article_id, created_at) 
            VALUES ('" . $comment . "', '" . $userId . "', '" . $status . "', '" . $articleId . "' , NOW())";
        $this->database->getPdo()->query($query);
    }


    /**
     * @return int|null
     */
    public function countTotalComments(): null|int
    {
        $query = "SELECT COUNT(*) as total FROM comment";
        $result = $this->getPdo()->query($query)->fetchObject();
        if ($result === false) {
            return null;
        }
        return $result->total;
    }

    #[Pure] private function getPdo(): PDO
    {
        return $this->database->getPdo();
    }

    /**
     * @return int|null
     */
    public function countTotalPendingComments(): null|int
    {
        $query = "SELECT COUNT(*) as total FROM comment WHERE status = 1";
        $result = $this->getPdo()->query($query)->fetchObject();
        if ($result === false) {
            return null;
        }
        return $result->total;
    }

    public function getAllCommentOrderedByStatus(): ?array
    {
        $query = "SELECT * FROM `comment` ORDER BY status";
        $result = $this->getPdo()->query($query,
            PDO::FETCH_CLASS,
            CommentEntity::class
        )->fetchAll();
        if ($result === false) {
            return null;
        }
        return $result;
    }
    public function changeStatus(int $commentId, int $status): void
    {
        $query = "UPDATE comment SET status = $status WHERE id = $commentId";
        $this->database->getPdo()->query($query);
    }
}
