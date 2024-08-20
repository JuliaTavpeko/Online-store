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

    public function handleBasketOperations(): array
    {
        $this->basketArray['itemPrice'] = $this->calculateItemData($this->basketArray);
        if (!$this->basket->checkUserProduct($this->basketArray['idUser'], $this->basketArray['idProd'])) {
            $this->basket->insertIntoBasket($this->basketArray);
        } else {
            $this->basket->updateBasketInDB($this->basketArray);
        }

        $basketData = $this->basket->getBasketFromDB($this->basketArray['idUser']);
        $basketData['totalPrice'] = $this->calculateTotalData($basketData);
        return $basketData;
    }

    public function calculateItemData($item): float|int
    {
        return Calculator::calculateItemPrice($item);
    }

    public function calculateTotalData($items): float|int
    {
        return Calculator::calculateTotalPrice($items);
    }

    public function deleteBasket(){
        return $this->basket->deleteBasketFromDB($this->basketArray['idUser']);
    }

    public function deleteProduct(){
        return $this->basket->deleteProduct($this->basketArray['idUser'],$this->basketArray['idProd']);
    }

    public function getBasket(): array
    {
        $basketData = $this->basket->getBasketFromDB($this->basketArray['idUser']);
        $basketData['totalPrice'] = $this->calculateTotalData($basketData);
        return $basketData;
    }
}