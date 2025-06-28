<?php

namespace Core;

use Core\Middleware\Middleware;

class Router{

   protected $routes = [];

   protected function add($uri, $controller, $method){

    $this->routes[] =[
        'uri' => $uri,
        'controller' => $controller,
        'method' => $method,
        'middleware' => null
    ];

    //or both are same 

    // compact('uri','controller','method');
    
   }

   public function get($uri, $controller){
    
        $this->add($uri, $controller, 'GET');
    return $this;
   }

   public function post($uri, $controller){

    $this->add($uri, $controller, 'POST');
    return $this;
   }
   
   public function delete($uri, $controller){

    $this->add($uri, $controller, 'DELETE');
    return $this;
   }
   
   public function patch($uri, $controller){

    $this->add($uri, $controller, 'PATCH');
    return $this;
   }
   
   public function put($uri, $controller){

    $this->add($uri, $controller, 'PUT');
    return $this;
   }
   public function only($key){

    $this->routes[array_key_last($this->routes)]['middleware'] = $key;

    return $this;
   }
   
   public function route($uri, $requestMethod){

    $requestMethod = strtoupper($requestMethod);

    foreach($this->routes as $route){

        if ($route['uri'] == $uri && strtoupper($route['method']) == $requestMethod){
            if ($route['middleware']) {
                Middleware::resolve($route['middleware']);
            }
            return require base_path($route['controller']);
        }
    }

    $this->abort();

   }

   protected function abort($code = 404, $message = 'Not Found') {
       http_response_code($code);
       $viewFile = base_path("views/{$code}.php");
       if (file_exists($viewFile)) {
           require $viewFile;
       } else {
           echo "<h1>$code</h1><p>$message</p>";
       }
       exit;
   }
}



