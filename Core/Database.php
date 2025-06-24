<?php

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

    public function findOrfail(){
        $result = $this->find();

        if (! $result){
            abort();
        }
        return $result;
    }

    public function get(){
        return $this->statement->fetchAll();
    }

}