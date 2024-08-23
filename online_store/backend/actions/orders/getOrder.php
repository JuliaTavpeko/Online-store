<?php

namespace backend\actions;
require __DIR__ . '/../../../vendor/autoload.php';

use backend\classes\order\Orders;

global $db;

header('Content-Type: application/json');
$requestPayload = file_get_contents('php://input');
$data = json_decode($requestPayload, true);

$order = new Orders($data, $db);
$result = $order->getOrder();
echo json_encode($result, JSON_UNESCAPED_UNICODE);
