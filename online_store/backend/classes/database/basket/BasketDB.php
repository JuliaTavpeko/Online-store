<?php

namespace backend\classes\database\basket;

use backend\classes\database\DatabaseManager;
use PDOException;

class BasketDB
{

    private $dbManager;

    public function __construct(DatabaseManager $dbManager)
    {
        $this->dbManager = $dbManager;
    }

    public function checkData($key, $value){
        try {
            $result = $this->dbManager->query("SELECT COUNT(*) as count FROM Basket WHERE {$key} = ?", [$value])->find();
            return $result && $result['count'] > 0;
        } catch (PDOException $e) {
            error_log('Ошибка проверки ' . $key . ': ' . $e->getMessage());
            return false;
        }
    }

    public function insertIntoBasket($basketData): bool
    {

        $query = "INSERT INTO Basket (`idUser`,`nameProd`, `quantity`, `price`) VALUES (:idUser,:nameProd, :quantity, :price)";
        try {
            $this->dbManager->query($query, $basketData);
            return true;
        } catch (PDOException $e) {
            error_log('Database error: ' . $e->getMessage());
            return false;
        }
    }

    public function updateBasket($quantity, $idUser){
        $query = "UPDATE Basket SET `quantity` = '{$quantity}' WHERE `idUser` = '{$idUser}'";
        try {
             return $this->dbManager->query($query)->find();
         } catch (PDOException $e) {
             error_log('Database error: ' . $e->getMessage());
             return ['error' => 'Произошла ошибка при получении данных.'];
         }
    }

    public function getBasket($idUser){

        $query = "SELECT Basket.*, Catalog.Photo
                    FROM Basket, Catalog
                   WHERE `idUser` = '{$idUser}'";
        try {
            $result = $this->dbManager->query($query)->find();
            if ($result['Photo']) {
                $result['Photo'] = base64_encode($result['Photo']);
            }
            return $result;
        } catch (PDOException $e) {
            error_log('Database error: ' . $e->getMessage());
            return ['error' => 'Произошла ошибка при получении данных.'];
        }
    }

    public function deleteFromBasket($id){
        $query = "DELETE FROM Basket WHERE `id` = '{$id}'";
        try {
            return $this->dbManager->query($query)->find();
        } catch (PDOException $e) {
            error_log('Database error: ' . $e->getMessage());
            return ['error' => 'Произошла ошибка при получении данных.'];
        }
    }


}