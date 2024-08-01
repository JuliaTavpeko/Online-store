<?php

namespace backend\classes\database\order;

use backend\classes\database\DatabaseManager;
use PDOException;

class Order
{
    private $dbManager;

    public function __construct(DatabaseManager $dbManager)
    {
        $this->dbManager = $dbManager;
    }

    public function makeOrder($orderData){

        $query = "INSERT INTO Orders (`user`, `phone`, `email`, `address`, `payment`) VALUES (:user, :phone, :email, :address, :payment)";
        try {
            $this->dbManager->query($query, $orderData);
            return true;
        } catch (PDOException $e) {
            error_log('Database error: ' . $e->getMessage());
            return false;
        }
    }

    public function getOrder($id){

        $query = 'SELECT * FROM Orders WHERE id = :id';
        try {
            return $this->dbManager->query($query, ['id' => $id])->find();
        } catch (PDOException $e) {
            error_log('Database error: ' . $e->getMessage());
            return ['error' => 'Произошла ошибка при получении данных.'];
        }
    }

}