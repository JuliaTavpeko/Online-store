<?php

namespace backend\classes\basket;
use backend\classes\database\DatabaseManager;
use backend\classes\database\basket\BasketDB;

require_once __DIR__ . '/../../../vendor/autoload.php';

class Basket
{
    public function __construct($basketArray, DatabaseManager $dbManager)
    {
        $this->basketArray = $basketArray;
        $this->basket = new BasketDB($dbManager);
    }

    public function returnData(){
        //$this->basket->insertIntoBasket($this->basketArray);
        return $this->basket->getBasket($this->basketArray['user']);
    }

}