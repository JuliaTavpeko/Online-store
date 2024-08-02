<?php

namespace backend\classes\order;
use backend\classes\database\DatabaseManager;
use backend\classes\database\order\OrderDB;

require_once __DIR__ . '/../../../vendor/autoload.php';

class Orders
{
    public function __construct($orderArray, DatabaseManager $dbManager)
    {
        $this->orderArray = $orderArray;
        $this->order = new OrderDB($dbManager);
    }

    public function returnData(){

        return $this->order->makeOrder($this->orderArray);
    }


}