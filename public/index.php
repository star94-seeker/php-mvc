<?php

session_start();

define('BASE_PATH', dirname(__DIR__));
define('BASE_URL', 'http://localhost:8000');

require_once '../vendor/autoload.php';

/**
 * Error and Exception handling
 */
error_reporting(E_ALL);
set_error_handler('System\Error::errorHandler');
set_exception_handler('System\Error::exceptionHandler');


/**
 * Routing
 */
$router = new System\Router();

// Add the routes
$router->add('/', ["controller" => "Home", "action" => "index"]);
$router->add('{controller}/{action}');
$router->add('{controller}/{id:\d+}/{action}');
$router->add('/admin/{controller}/{action}', ['namespace' => 'Admin']);

$url = $_SERVER['REQUEST_URI'];
$router->dispatch($url);
