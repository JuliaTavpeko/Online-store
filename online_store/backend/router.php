<?php

require CONFIG . '/routes.php';

$uri = trim(parse_url($_SERVER['REQUEST_URI'])['path'], '/');

if (array_key_exists($uri, $routes)) {
    $file = ROOT . "/{$routes[$uri]}";
    if (file_exists($file)) {
        require $file;
    } else {
        echo "Page not found.";
    }
} else {
    echo "Page not found.";
}
