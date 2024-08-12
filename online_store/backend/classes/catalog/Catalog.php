<?php

namespace backend\classes\catalog;

use backend\classes\database\DatabaseManager;
use backend\classes\database\catalog\CatalogDB;

require_once __DIR__ . '/../../../vendor/autoload.php';

class Catalog
{
    public function __construct($idProd, DatabaseManager $dbManager)
    {
        $this->idProd = $idProd;
        $this->product = new CatalogDB($dbManager);
    }

    public function getProductData()
    {
        return $this->product->getProductFromDB($this->idProd);
    }

}