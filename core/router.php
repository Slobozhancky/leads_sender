<?php

$uri = trim(parse_url($_SERVER['REQUEST_URI'])['path'], '/');
$routes = require CONFIG . '/routes.php';

if (array_key_exists($uri, $routes)) {
    require_once CONTROLLERS . "/{$routes[$uri]}";
} else {
    dd(404);
    aboard();
}
