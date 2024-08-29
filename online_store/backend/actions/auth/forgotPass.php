<?php

namespace backend\actions;
require __DIR__ . '/../../../vendor/autoload.php';
use backend\classes\users\auth\Authorization;

global $db;

header('Content-Type: application/json');
$requestPayload = file_get_contents('php://input');
$data = json_decode($requestPayload, true);

$auth = new Authorization($data, $db);
$result = $auth->changePass();
echo json_encode($result, JSON_UNESCAPED_UNICODE);