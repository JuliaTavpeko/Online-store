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

        if(!$this->basket->checkData('idUser', $this->basketArray['idUser'])){
            $this->basket->insertIntoBasket($this->basketArray);
        } else if($this->basket->checkData('idUser', $this->basketArray['idUser']) && $this->basket->checkData('quantity', $this->basketArray['quantity']) != $this->basketArray['quantity']) {
            $this->basket->updateBasket($this->basketArray['quantity'], $this->basketArray['idUser']);
        }

        return $this->basket->getBasket($this->basketArray['idUser']);
    }


}