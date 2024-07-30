<?php

namespace backend\classes\database;

use PDO;
use PDOException;
use PDOStatement;

class DatabaseManager
{
    private $connection;
    private PDOStatement $stmt;

    private static $instance = null;

    protected function __construct(){}

    public static function getInstance(){
        if(self::$instance === null){
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection(array $db_config)
    {
        if ($this->connection === null) {
            $dsn = "mysql:host={$db_config['host']};dbname={$db_config['dbname']};charset={$db_config['charset']};";

            try {
                $this->connection = new PDO($dsn, $db_config['username'], $db_config['password'], $db_config['options']);
            } catch (PDOException $e){
                error_log('Ошибка подключения: ' . $e->getMessage());
                die;
            }
        }
        return $this->connection;
    }
    
    public function query($query, $params = [])
    {
        try {
            $this->stmt = $this->connection->prepare($query);
            $this->stmt->execute($params);
        } catch (PDOException $e) {
            error_log('Ошибка выполнения запроса: ' . $e->getMessage());
            return false;
        }

        return $this;
    }

    public function findAll(){
        return $this->stmt->fetchAll();
    }

    public function find(){
        return $this->stmt->fetch();
    }
}
