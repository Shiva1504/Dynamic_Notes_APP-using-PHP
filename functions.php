<?php

function dd($value) {
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
    die();
}

function isCurrentPage($url) {
    return $_SERVER['REQUEST_URI'] === $url;
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

// function isCurrentPage($path) {
//     return strpos($_SERVER['REQUEST_URI'], $path) !== false;
// }


// <?= isCurrentPage('/Test/Section2/') 
//     ? 'rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white" aria-current="page' 
//     : 'rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white' ?>