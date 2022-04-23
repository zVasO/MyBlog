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

}


