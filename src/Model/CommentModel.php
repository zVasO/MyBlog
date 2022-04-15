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
        return $this->database->getPdo()->query('SELECT * FROM comment', PDO::FETCH_CLASS, ArticleModel::class)->fetchAll();
    }

    public function getCommentById(int $id)
    {
        return $this->database->getPdo()->query("SELECT * FROM comment WHERE id = $id", PDO::FETCH_CLASS, ArticleModel::class)->fetchAll();
    }
    public function getNumberOfCommentsByArticle(int $id)
    {
        return $this->database->getPdo()->query("SELECT COUNT(*) FROM comment WHERE id = $id", PDO::FETCH_CLASS, ArticleModel::class)->fetchAll();
    }
}