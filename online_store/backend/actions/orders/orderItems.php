<?php

namespace backend\actions;
require __DIR__ . '/../../../vendor/autoload.php';

use backend\classes\order\OrderItems;

global $db;

header('Content-Type: application/json');
$requestPayload = file_get_contents('php://input');
$data = json_decode($requestPayload, true);

$order = new OrderItems($data, $db);
$result = $order->makeOrderItems();
echo json_encode($result, JSON_UNESCAPED_UNICODE);