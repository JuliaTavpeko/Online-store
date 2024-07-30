<?php

/**
 * @var DatabaseManager $db
 */

use backend\classes\database\DatabaseManager;

require dirname(__DIR__) . '/vendor/autoload.php';

require dirname(__DIR__) . '/backend/config/env.php';
require SERVICES . '/funcs.php';
require CLASSES . '/database/DatabaseManager.php';

$db_config = require CONFIG . '/db.php';
$db = DatabaseManager::getInstance();
$db->getConnection($db_config);

require ROOT . '/backend/router.php';
