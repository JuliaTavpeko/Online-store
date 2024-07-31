<?php

namespace backend\classes\database\catalog;

use backend\classes\database\DatabaseManager;
use PDOException;

class Catalog
{
    private $dbManager;

    public function __construct(DatabaseManager $dbManager)
    {
        $this->dbManager = $dbManager;
    }

    public function getProduct($id)
    {
        $query = 'SELECT * FROM Catalog WHERE id = :id';
        try {
            $result = $this->dbManager->query($query, ['id' => $id])->find();
            if ($result['Photo']) {
                $result['Photo'] = base64_encode($result['Photo']);
            }
            return $result;
        } catch (PDOException $e) {
            error_log('Database error: ' . $e->getMessage());
            return ['error' => 'Произошла ошибка при получении данных.'];
        }
    }

}