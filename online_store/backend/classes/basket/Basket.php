<?php

namespace backend\classes\basket;
use backend\classes\database\DatabaseManager;
use backend\classes\database\basket\BasketDB;
use backend\classes\helpers\Calculator;

require_once __DIR__ . '/../../../vendor/autoload.php';

class Basket
{
    public function __construct($basketArray, DatabaseManager $dbManager)
    {
        $this->basketArray = $basketArray;
        $this->basket = new BasketDB($dbManager);
    }

    public function returnData(){

        $this->basketArray['itemPrice'] = $this->calculateData($this->basketArray);
        if(!$this->basket->checkData('idUser', $this->basketArray['idUser'])){
            $this->basket->insertIntoBasket($this->basketArray);
        } else if($this->basket->checkData('idUser', $this->basketArray['idUser']) && $this->basket->checkData('quantity', $this->basketArray['quantity']) != $this->basketArray['quantity']) {
            $this->basket->updateBasket($this->basketArray);
        }
        return $this->basket->getBasket($this->basketArray['idUser']);
    }

    public function calculateData($item): float|int
    {
        return Calculator::calculateItemPrice($item);
    }

    public function deleteBasket(){
        return $this->basket->deleteFromBasket($this->basketArray['idUser']);
    }

    public function getBasket(){
        return $this->basket->getBasket($this->basketArray['idUser']);
    }
}