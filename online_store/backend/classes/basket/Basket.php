<?php

namespace backend\classes\basket;
use backend\classes\database\DatabaseManager;
use backend\classes\database\catalog\Catalog;

require_once __DIR__ . '/../../../vendor/autoload.php';

class Basket
{
    public function __construct($idProd, DatabaseManager $dbManager)
    {
        $this->idProd = $idProd;
        $this->product = new Catalog($dbManager);
    }

    public function returnData(){
        return $this->product->getProduct($this->idProd);
    }




}