<?php

require_once __DIR__ . '/vendor/autoload.php';

use Moz\Core\Router;

$router = new Router([
    "url_verification" => "AuthController#challenge"
]);
$router->direct();
