<?php
declare(strict_types=1);
namespace App\Model;

use App\Services\DatabaseService;

class UserModel
{

    private DatabaseService $databaseService;

    public function __construct()
    {
        $this->database = DatabaseService::getInstance();
    }

    public function getUserByEmail(string $email)
    {
        return $this->database->getPdo()->query("SELECT * FROM user WHERE email = '" . $email . "'")->fetchObject();
    }
    public function ensureUserExist(string $email)
    {
        return $this->database->getPdo()->query("SELECT * FROM user WHERE email = '" . $email . "'")->fetchObject();
    }
    public function insertUser(string $email, string $password, string $lastname, string $firstname)
    {
        return $this->database->getPdo()->query("INSERT INTO user (email, password, lastname, firstname, created_at, Role_id) VALUES ('" . $email . "','" . $password . "', '" . $lastname . "', '" . $firstname . "',  NOW(), 1)");
    }
}