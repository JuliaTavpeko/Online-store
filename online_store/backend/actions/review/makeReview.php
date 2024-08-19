<?php

namespace backend\actions;
require __DIR__ . '/../../../vendor/autoload.php';

use backend\classes\reviews\Reviews;

global $db;

header('Content-Type: application/json');
$requestPayload = file_get_contents('php://input');
$data = json_decode($requestPayload, true);

$review = new Reviews($data, $db);
$result = $review->makeReview();
echo json_encode($result, JSON_UNESCAPED_UNICODE);
