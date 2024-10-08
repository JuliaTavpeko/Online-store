<?php

namespace backend\classes\database\catalog;

use backend\classes\database\DatabaseManager;
use PDOException;

class CatalogDB
{
    private $dbManager;

    public function __construct(DatabaseManager $dbManager)
    {
        $this->dbManager = $dbManager;
    }

    public function getProductFromDB($id)
    {
        $query = 'SELECT * FROM Catalog WHERE id = :id';
        try {
            return $this->dbManager->query($query, ['id' => $id])->find();
        } catch (PDOException $e) {
            error_log('Database error: ' . $e->getMessage());
            return ['error' => 'Произошла ошибка при получении данных.'];
        }
    }

    public function getProducts()
    {
        $query = 'SELECT * FROM Catalog';
        try {
            return $this->dbManager->query($query)->findAll();
        } catch (PDOException $e) {
            error_log('Database error: ' . $e->getMessage());
            return ['error' => 'Произошла ошибка при получении данных.'];
        }
    }

    public function setProdRating($rating, $idProd)
    {
        $query = "UPDATE Catalog SET 
                Rating = :rating 
              WHERE 
                id = :idProd";
        try {
            return $this->dbManager->query($query, ['rating' => $rating, 'idProd' => $idProd])->find();
        } catch (PDOException $e) {
            error_log('Database error: ' . $e->getMessage());
            return ['error' => 'Произошла ошибка при обновлении данных.'];
        }
    }
}