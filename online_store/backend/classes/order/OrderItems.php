<?php

namespace backend\classes\order;
use backend\classes\database\DatabaseManager;
use backend\classes\database\order\OrderDB;

require_once __DIR__ . '/../../../vendor/autoload.php';

class OrderItems
{
    public function __construct($orderItemsArray, DatabaseManager $dbManager)
    {
        $this->orderItemsArray = $orderItemsArray;
        $this->order = new OrderDB($dbManager);
    }

    public function makeOrderItems(){
        $this->order->insertOrderItems($this->orderItemsArray);
        return $this->order->getOrderItems($this->orderItemsArray['idUser']);
    }

}