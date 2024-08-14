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
        $query = "INSERT INTO Basket (`idUser`, `idProd`,`nameProd`, `quantity`, `price` , `itemPrice`, `photo`) VALUES (:idUser,:idProd,:nameProd, :quantity, :price, :itemPrice, :photo)";
        try {
            $this->dbManager->query($query, $basketData);
            return true;
        } catch (PDOException $e) {
            error_log('Database error: ' . $e->getMessage());
            return false;
        }
    }

    public function updateBasketInDB($item){
        $query = "UPDATE Basket SET 
                nameProd = '{$item['nameProd']}', 
                quantity = '{$item['quantity']}', 
                price = '{$item['price']}', 
                itemPrice = '{$item['itemPrice']}', 
                photo = '{$item['photo']}' 
              WHERE 
                idUser = '{$item['idUser']}' AND 
                idProd = '{$item['idProd']}'";
        try {
             return $this->dbManager->query($query)->find();
         } catch (PDOException $e) {
             error_log('Database error: ' . $e->getMessage());
             return ['error' => 'Произошла ошибка при получении данных.'];
         }
    }

    public function getBasketFromDB($idUser){
        $query = "SELECT Basket.*
                    FROM Basket
                   WHERE `idUser` = '{$idUser}' ";
        try {
            return $this->dbManager->query($query)->findAll();
        } catch (PDOException $e) {
            error_log('Database error: ' . $e->getMessage());
            return ['error' => 'Произошла ошибка при получении данных.'];
        }
    }

    public function deleteBasketFromDB($idUser){
        $query = "DELETE FROM Basket WHERE `idUser` = '{$idUser}'";
        try {
            return $this->dbManager->query($query)->find();
        } catch (PDOException $e) {
            error_log('Database error: ' . $e->getMessage());
            return ['error' => 'Произошла ошибка при получении данных.'];
        }
    }
}