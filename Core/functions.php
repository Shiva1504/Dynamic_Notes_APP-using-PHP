<?php

function dd($value) {
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
    die();
}

function isCurrentPage($url) {
    $current = rtrim($_SERVER['REQUEST_URI'], '/');
    $url = rtrim($url, '/');
    return $current === $url;
}

function abort($code = 404, $message = 'Not Found') {
    http_response_code($code);
    $viewFile = base_path("views/{$code}.php");
    if (file_exists($viewFile)) {
        require $viewFile;
    } else {
        echo "<h1>$code</h1><p>$message</p>";
    }
    exit;
}

function navClass($path) {
    $active = 'rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white';
    $inactive = 'rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white';
    return isCurrentPage($path) ? $active . ' aria-current="page"' : $inactive;
}

function authorize($condition, $status){
    if(! $condition){
        abort($status);
    }
}

function base_path($path){
    return BASE_PATH . $path;
}

function view($path, $attribute = []){
    extract($attribute);
    require base_path('views/' . $path);
}

function redirect($url){
    header("location: {$url}");
    exit();
}