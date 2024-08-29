<?php

namespace backend\classes\database\user;

use backend\classes\database\DatabaseManager;
use PDOException;

class User
{
    private $dbManager;

    public function __construct(DatabaseManager $dbManager)
    {
        $this->dbManager = $dbManager;
    }

    public function checkData($key, $value){
        try {
            $result = $this->dbManager->query("SELECT COUNT(*) as count FROM Users WHERE {$key} = ?", [$value])->find();
            return $result && $result['count'] > 0;
        } catch (PDOException $e) {
            error_log('Ошибка проверки ' . $key . ': ' . $e->getMessage());
            return false;
        }
    }

    public function updateData($item){
        $query = "UPDATE Users SET 
                pass = '{$item['newPass']}', 
                passRepeat = '{$item['repeatNewPass']}'
              WHERE 
                login = '{$item['loginAuth']}'";
        try {
            return $this->dbManager->query($query)->find();
        } catch (PDOException $e) {
            error_log('Database error: ' . $e->getMessage());
            return ['error' => 'Произошла ошибка при получении данных.'];
        }
    }

    public function insertUserIntoDB($userData): bool
    {
        $query = "INSERT INTO Users (`login`, `email`, `pass`, `passRepeat`, `photo`) VALUES (:login, :email, :pass, :passRepeat, :photo)";
        try {
            $this->dbManager->query($query, $userData);
            return true;
        } catch (PDOException $e) {
            error_log('Database error: ' . $e->getMessage());
            return false;
        }
    }

    public function getUser($login)
    {
        $query = 'SELECT id, login, pass, photo FROM Users WHERE login = :login';
        try {
            return $this->dbManager->query($query, ['login' => $login])->find();
        } catch (PDOException $e) {
            error_log('Database error: ' . $e->getMessage());
            return ['error' => 'Произошла ошибка при получении данных.'];
        }
    }
}
