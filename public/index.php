<?php

use App\core\Router;

define('webroot', str_replace(['\public', '/public'], '', __DIR__));

require_once('../vendor/autoload.php');

session_start();

$router = new Router;

$router->run();