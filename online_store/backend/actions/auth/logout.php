<?php

namespace backend\actions;
require __DIR__ . '/../../../vendor/autoload.php';
use backend\classes\users\auth\Authorization;

header('Content-Type: application/json');
$auth = new Authorization([]);
$result = $auth->deleteSession();

if ($result) {
    error_log('Session successfully destroyed');
} else {
    error_log('Failed to destroy session');
}
echo json_encode(['success' => $result]);