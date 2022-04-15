<?php

declare(strict_types=1);
namespace App\Model;

use App\Services\DatabaseService;
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

    public function getAllPublishedCommentByArticleId(int $id)
    {
        return $this->database->getPdo()->query("SELECT comment.* FROM comment, article WHERE article.id = $id AND comment.article_id = $id AND comment.status = 'published'", PDO::FETCH_CLASS, CommentModel::class)->fetchAll();
    }
    public function getNumberOfCommentsByArticle(int $id)
    {
        $request = $this->database->getPdo()->query("SELECT count(*) as number FROM `comment`, `article` WHERE article.id = $id AND comment.article_id = $id AND comment.status = 'published'", PDO::FETCH_CLASS, CommentModel::class)->fetchAll();

        if ($request != false)
        {
            return $request[0]->number;
        } else {
            return 0;
        }

    }
}