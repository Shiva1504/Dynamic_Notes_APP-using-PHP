<?php

// header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
// header('Cache-Control: post-check=0, pre-check=0', false);
// header('Pragma: no-cache');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use Core\Session;
use Core\ValidationException;

session_start();


const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'Core/functions.php';

require BASE_PATH('vendor/autoload.php');

require base_path("bootstrap.php");

$router = new \Core\Router();

$routes = require base_path('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$requestMethod = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

try{
    $router->route($uri, $requestMethod);
}  catch(ValidationException $e){

    Session::flash('errors', $e->errors);
    Session::flash('old', $e->old);
    
    return redirect($router->previousUrl());
}

Session::unflash();