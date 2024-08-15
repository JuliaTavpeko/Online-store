<?php

namespace backend\classes\database\order;

use backend\classes\database\DatabaseManager;
use PDOException;

class OrderDB
{
    private $dbManager;

    public function __construct(DatabaseManager $dbManager)
    {
        $this->dbManager = $dbManager;
    }

    public function insertOrderIntoDB($orderData): bool
    {
        $query = "INSERT INTO Orders (`idUser`, `user`, `phone`, `email`, `address`, `totalPrice`, `payment`) VALUES (:idUser, :user,  :phone, :email, :address, :totalPrice, :payment)";
        try {
            $this->dbManager->query($query, $orderData);
            return true;
        } catch (PDOException $e) {
            error_log('Database error: ' . $e->getMessage());
            return false;
        }
    }

    public function getOrderFromDB($idUser){
        $query = "SELECT * FROM Orders WHERE `idUser` = '{$idUser}'";
        try {
            return $this->dbManager->query($query)->find();
        } catch (PDOException $e) {
            error_log('Database error: ' . $e->getMessage());
            return ['error' => 'Произошла ошибка при получении данных.'];
        }
    }

    public function insertOrderItems($orderItemsData): bool
    {
        $query = "INSERT INTO Orders (`idOrder`, `idUser`, `idProd`, `nameProd`, `quantity`, `price`, `itemPrice`, `photo`) VALUES (:idOrder, :idUser, :idProd, :nameProd,  :quantity, :price, :itemPrice, :photo)";
        try {
            $this->dbManager->query($query, $orderItemsData);
            return true;
        } catch (PDOException $e) {
            error_log('Database error: ' . $e->getMessage());
            return false;
        }
    }

    public function getOrderItems($idUser){
        $query = "SELECT * FROM Orders WHERE `idUser` = '{$idUser}'";
        try {
            return $this->dbManager->query($query)->find();
        } catch (PDOException $e) {
            error_log('Database error: ' . $e->getMessage());
            return ['error' => 'Произошла ошибка при получении данных.'];
        }
    }
}