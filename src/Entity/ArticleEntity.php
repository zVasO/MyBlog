<?php

declare(strict_types=1);

namespace App\Entity;

use DateTime;

class ArticleEntity
{
    private int $id;
    private string $title;
    private string $header;
    private string $content;
    private string $createdAt;
    private string $updatedAt;
    private int $userId;
    private string $status;

    public function __set(string $name, $value): void
    {
        if ($name === "id") {
            $this->id = $value;
        }
        if ($name === "title") {
            $this->title = $value;
        }
        if ($name === "header") {
            $this->header = $value;
        }
        if ($name === "content") {
            $this->content = $value;
        }
        if ($name === "created_at") {
            $this->createdAt = (new DateTime($value))->format('d/m/Y');
        }
        if ($name === "updated_at") {
            $this->updatedAt = (new DateTime($value))->format('d/m/Y');
        }
        if ($name === "User_id") {
            $this->userId = $value;
        }
        if ($name === "status") {
            $this->status = $value;
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
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getHeader(): string
    {
        return $this->header;
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
     * @return string
     */
    public function getUpdatedAt(): string
    {
        return $this->updatedAt;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

}


