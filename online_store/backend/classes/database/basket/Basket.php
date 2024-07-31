<?php

namespace backend\classes\database\basket;

use backend\classes\database\DatabaseManager;
use PDOException;

class Basket
{

    private $dbManager;

    public function __construct(DatabaseManager $dbManager)
    {
        $this->dbManager = $dbManager;
    }

    public function addToBasket(){

    }

    public function updateBasket(){

    }

    public function getBasket(){

    }

    public function deleteFromBasket(){

    }


}