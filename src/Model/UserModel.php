<?php
declare(strict_types=1);

namespace App\Model;

use App\Services\DatabaseService;
use JetBrains\PhpStorm\Pure;
use PDO;

class UserModel
{

    private DatabaseService $database;

    public function __construct()
    {
        $this->database = DatabaseService::getInstance();
    }

    /**
     * @param string $email
     * @return false|mixed|object
     */
    public function getUserByEmail(string $email): mixed
    {
        $query = "SELECT * FROM user WHERE email = '" . $email . "'";
        return $this->database->getPdo()->query($query)->fetchObject();
    }

    /**
     * @param string $email
     * @return mixed|object|null
     */
    public function ensureUserExist(string $email): mixed
    {
        $query = "SELECT * FROM user WHERE email = '" . $email . "'";
        $result = $this->database->getPdo()->query($query)->fetchObject();
        if ($result === false) {
            return null;
        }
        return $result;
    }

    /**
     * @param string $email
     * @param string $password
     * @param string $lastname
     * @param string $firstname
     * @return void
     */
    public function insertUser(string $email, string $password, string $lastname, string $firstname): void
    {
        $query = "INSERT INTO user (email, password, lastname, firstname, created_at, Role_id) 
            VALUES ('" . $email . "','" . $password . "', '" . $lastname . "', '" . $firstname . "',  NOW(), 1)";
        $this->database->getPdo()->query($query);
    }

    /**
     * @param string $email
     * @return int|null
     */
    public function getIdByEmail(string $email): null|int
    {
        $query = "SELECT id FROM user WHERE email = '" . $email . "'";
        $result = $this->database->getPdo()->query($query)->fetchObject();
        if ($result === false) {
            return null;
        }
        return $result->id;

    }

    /**
     * @return null|int
     */
    public function countTotalUsers(): int|null
    {
        $query = "SELECT COUNT(*) as total FROM user";
        $result = $this->getPdo()->query($query)->fetchObject();
        if ($result === false) {
            return null;
        }
        return $result->total;
    }

    /**
     * @return PDO
     */
    #[Pure] private function getPdo(): PDO
    {
        return $this->database->getPdo();
    }

}
