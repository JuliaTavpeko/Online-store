<?php

namespace backend\actions;
require __DIR__ . '/../../../vendor/autoload.php';

use backend\classes\basket\Basket;

global $db;

header('Content-Type: application/json');
$requestPayload = file_get_contents('php://input');
$data = json_decode($requestPayload, true);

$basket = new Basket($data, $db);
$result = $basket->getBasket();
echo json_encode($result, JSON_UNESCAPED_UNICODE);
