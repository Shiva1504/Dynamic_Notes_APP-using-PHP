<?php

$routes = require base_path('routes.php');

function abort($code = 404, $message = 'Not Found') {
    http_response_code($code);
    $viewFile = "views/{$code}.php";
    if (file_exists($viewFile)) {
        require $viewFile;
    } else {
        echo "<h1>$code</h1><p>$message</p>";
    }
    exit;
}

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];


if (array_key_exists($uri, $routes)) {
    require base_path($routes[$uri]);
} else {
   abort(); 
}


