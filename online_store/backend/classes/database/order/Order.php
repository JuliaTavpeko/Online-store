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

    public function makeOrder(){

    }

}