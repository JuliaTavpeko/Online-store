<?php

namespace backend\classes\database\news;

use backend\classes\database\DatabaseManager;
use PDOException;

class NewsDB
{

    private $dbManager;

    public function __construct(DatabaseManager $dbManager)
    {
        $this->dbManager = $dbManager;
    }

    public function getNewsFromDB($id)
    {
        $query = 'SELECT * FROM News WHERE id = :id';
        try {
            $result = $this->dbManager->query($query, ['id' => $id])->find();
            if ($result['pic']) {
                $result['pic'] = base64_encode($result['pic']);
            }
            return $result;
        } catch (PDOException $e) {
            error_log('Database error: ' . $e->getMessage());
            return ['error' => 'Произошла ошибка при получении данных.'];
        }
    }

    public function getNews()
    {
        $query = 'SELECT * FROM News';
        try {
            $result = $this->dbManager->query($query)->findAll();
            return $result;
        } catch (PDOException $e) {
            error_log('Database error: ' . $e->getMessage());
            return ['error' => 'Произошла ошибка при получении данных.'];
        }
    }

}