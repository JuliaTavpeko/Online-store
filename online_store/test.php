<?php

/**
 * @var DatabaseManager $db
 */

use backend\classes\database\DatabaseManager;

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/backend/config/env.php';
require CLASSES . '/database/DatabaseManager.php';

$db_config = require CONFIG . '/db.php';
$db = (DatabaseManager::getInstance())->getConnection($db_config);

$userData = [
    'login' => 'Katya',
    'email' => 'julia@gmail.com',
    'pass' => 'password',
    'passRepeat' => 'password',
    'photo' => '1'
];

$result = $db->query("SELECT COUNT(*) as count FROM Users WHERE login = ?", [$userData['login']])->find();

if ($result['count'] > 0) {
    echo 'Пользователь с таким логином уже существует.';
} else {
    $query = "INSERT INTO Users (`login`, `email`, `pass`, `passRepeat`, `photo`) VALUES (:login, :email, :pass, :passRepeat, :photo)";
    try {
        $db->query($query, $userData);
        echo 'Пользователь успешно добавлен.';
    } catch (PDOException $e) {
        error_log('Database error: ' . $e->getMessage());
        echo 'Произошла ошибка при добавлении пользователя.';
    }
}
