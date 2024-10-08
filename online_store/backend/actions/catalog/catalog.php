<?php

namespace backend\actions;
require __DIR__ . '/../../../vendor/autoload.php';

use backend\classes\catalog\Catalog;

global $db;

header('Content-Type: application/json');
$requestPayload = file_get_contents('php://input');
$data = json_decode($requestPayload, true);

$catalog = new Catalog($data, $db);
$result = $catalog->getProductData();
echo json_encode($result, JSON_UNESCAPED_UNICODE);
