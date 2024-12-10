<?php

/**
 * @var DatabaseManager $db
 */

use backend\classes\database\DatabaseManager;

require dirname(__DIR__) . '/vendor/autoload.php';

require dirname(__DIR__) . '/backend/config/env.php';
require SERVICES . '/funcs.php';
require CLASSES . '/database/DatabaseManager.php';

$lang_code = $_GET['lang'] ?? 'ru';
$lang_file_path = dirname(__DIR__) . "/backend/static/lang/" . $lang_code . ".php";
if (file_exists($lang_file_path)) {
    include($lang_file_path);
} else {
    include(dirname(__DIR__) . "/backend/static/lang/ru.php");
}

$db_config = require CONFIG . '/db.php';
$db = DatabaseManager::getInstance();
$db->getConnection($db_config);
require ROOT . '/backend/router.php';