<?php

declare(strict_types=1);

namespace App\Entity;

use DateTime;

class CommentEntity
{
    private int $id;
    private string $content;
    private string $createdAt;
    private int $userId;
    private int $articleId;
    private string $status;


    public function __set(string $name, $value): void
    {
        if ($name === "id") {
            $this->id = $value;
        }
        if ($name === "content") {
            $this->content = $value;
        }
        if ($name === "createdAt") {
            $this->createdAt = (new DateTime($value))->format('d/m/Y');
        }
        if ($name === "User_id") {
            $this->userId = $value;
        }
        if ($name === "status") {
            $this->status = $value;
        }
        if ($name === "article_id") {
            $this->articleId = $value;
        }
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @return int
     */
    public function getArticleId(): int
    {
        return $this->articleId;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

}

