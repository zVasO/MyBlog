<?php

declare(strict_types=1);
namespace App\Services;

use PDO;

class DatabaseService
{
    private static array $instances = [];
    public PDO $pdo;

    public function __construct()
    {
        $this->pdo = new PDO("mysql:host=".$_ENV["DB_HOST"].';port='.$_ENV["DB_PORT"].';dbname='.$_ENV["DB_NAME"],
            $_ENV["DB_USER"],$_ENV["DB_PASS"],array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
    }

    /**
     * @return DatabaseService
     */
    public static function  getInstance():DatabaseService
    {
        $cls = static::class;
        if (!isset(self::$instances[$cls])) {
            self::$instances[$cls] = new static();
        }
        return self::$instances[$cls];
    }

    /**
     * @return PDO
     */
    public function getPdo(): PDO
    {
        return $this->pdo;
    }

}
