<?php

namespace backend\actions;
require __DIR__ . '/../../../vendor/autoload.php';
use backend\classes\users\auth\Authorization;

global $db;

header('Content-Type: application/json');
$auth = new Authorization([], $db);
$result = $auth->deleteSession();

if ($result) {
    error_log('Session successfully destroyed');
} else {
    error_log('Failed to destroy session');
}
echo json_encode(['success' => $result]);