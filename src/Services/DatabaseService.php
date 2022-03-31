<?php

namespace App\Service;

use PDO;

class DatabaseService
{
    private static array $instances = [];
    private const PARAM_host = 'localhost';
    private const PARAM_port = '3306';
    private const PARAM_db_name = 'myblog';
    private const PARAM_user = 'root';
    private const PARAM_db_pass = "root";
    public PDO $pdo;

    public function __construct()
    {
        $this->pdo = new PDO("mysql:host=".self::PARAM_host.';port='.self::PARAM_port.';dbname='.self::PARAM_db_name,
            self::PARAM_user,self::PARAM_db_pass);
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