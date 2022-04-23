<?php

declare(strict_types=1);

namespace App\Entity;

use DateTime;

class UserEntity
{
    private int $id;
    private string $email;
    private string $password;
    private string $lastname;
    private string $firstname;
    private int $roleId;
    private DateTime $createdAt;

    public function __set(string $name, $value): void
    {
        if ($name === "id") {
            $this->id = $value;
        }
        if ($name === "email") {
            $this->email = $value;
        }
        if ($name === "password") {
            $this->password = $value;
        }
        if ($name === "lastname") {
            $this->lastname = $value;
        }
        if ($name === "firstname") {
            $this->firstname = $value;
        }
        if ($name === "Role_id") {
            $this->roleId = $value;
        }
        if ($name === "created_at") {
            $this->createdAt = $value;
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
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @return int
     */
    public function getRoleId(): int
    {
        return $this->roleId;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

}


