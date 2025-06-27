<?php

namespace Core;

class Router{

   protected $routes = [];

   protected function add($uri, $controller, $method){

    $this->routes[] =[
        'uri' => $uri,
        'controller' => $controller,
        'method' => $method
    ];

    //or both are same 

    // compact('uri','controller','method');
    
   }

   public function get($uri, $controller){
    
        $this->add($uri, $controller, 'GET');

   }

   public function post($uri, $controller){

    $this->add($uri, $controller, 'POST');

   }
   
   public function patch($uri, $controller){

    $this->add($uri, $controller, 'PATCH');

   }
   
   public function put($uri, $controller){

    $this->add($uri, $controller, 'PUT');

   }

   public function route($uri, $requestMethod){

    $requestMethod = strtoupper($requestMethod);

    foreach($this->routes as $route){
        if ($route['uri'] == $uri && strtoupper($route['method'] == $requestMethod)){
            
            require base_path($route['controller']);
            return;

        }
    }

    abort();

   }

   public function abort($code = 404, $message = 'Not Found') {
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



