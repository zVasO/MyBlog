<?php
declare(strict_types=1);

namespace App\Model;

use App\Entity\UserEntity;
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
        $result = $this->getPdo()->query($query, PDO::FETCH_CLASS, UserEntity::class)->fetch();
        if ($result === false) {
            return null;
        }
        return $result;
    }

    /**
     * @return PDO
     */
    #[Pure] private function getPdo(): PDO
    {
        return $this->database->getPdo();
    }

    public function getUserById(int $id)
    {
        $query = "SELECT * FROM user WHERE id = '" . $id . "'";
        $result = $this->getPdo()->query($query, PDO::FETCH_CLASS, UserEntity::class)->fetch();
        if ($result === false) {
            return null;
        }
        return $result;

    }

    /**
     * @param string $email
     * @return mixed|object|null
     */
    public function ensureUserExist(string $email): mixed
    {
        $query = "SELECT * FROM user WHERE email = '" . $email . "'";
        return $this->getPdo()->query($query, PDO::FETCH_CLASS, UserEntity::class)->fetch();
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
            VALUES (:email, :password, :lastname, :firstname, NOW(), :role)";
        $data = [
            'email' => $email,
            'password' => $password,
            'lastname' => $lastname,
            'firstname' => $firstname,
            'role' => '1'
        ];
        $test = $this->getPdo()->prepare($query)->execute($data);
    }

    /**
     * @param string $email
     * @return int|null
     */
    public function getIdByEmail(string $email): null|int
    {
        $query = "SELECT id FROM user WHERE email = '" . $email . "'";
        $result = $this->getPdo()->query($query, PDO::FETCH_CLASS, UserEntity::class)->fetch();
        if ($result === false) {
            return null;
        }
        return $result->getId();

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

}
