<?php

namespace Core;

use PDO;

class Database{

    public $pdo;
    public $statement;

    public function __construct($config, $username = 'root', $password = ''){

        //$dsn = 'mysql:' . str_replace('&', ';', http_build_query($config));
        $dsn = 'mysql:' . http_build_query($config,'',';');
        $this->pdo = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query($query, $params = []){

        $this->statement = $this->pdo->prepare($query);
        $this->statement->execute($params);

        return $this;
    }

    public function find(){
        return $this->statement->fetch();
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

    public function findOrfail(){
        $result = $this->find();

        if (! $result){
            $this->abort();
        }
        return $result;
    }

    public function get(){
        return $this->statement->fetchAll();
    }


}