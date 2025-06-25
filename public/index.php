<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use Core\Response;

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'Core/functions.php';

spl_autoload_register(function ($class){

    $class = str_replace('\\', DIRECTORY_SEPARATOR ,$class);
    require base_path("{$class}.php");
});

require base_path('Core/router.php');





// Dispalying things from database example
// require 'Database.php';

// $config = require('config.php');

// $id = $_GET['id'];

// $query = "SELECT * FROM Posts where id = ?";

// $db = new Database($config['database']);
// $posts = $db->query($query, [$id])->fetch();

// dd($posts);
