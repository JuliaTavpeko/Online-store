<?php

namespace backend\actions;
require __DIR__ . '/../../../vendor/autoload.php';

use backend\classes\order\Orders;
use backend\classes\database\DatabaseManager;

global $db;

header('Content-Type: application/json');
$requestPayload = file_get_contents('php://input');
$data = json_decode($requestPayload, true);

$order = new Orders($data, $db);
$result = $order->returnData();
echo json_encode($result, JSON_UNESCAPED_UNICODE);
