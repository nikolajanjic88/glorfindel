<?php

class Database {
    
    protected $conn;
    protected $stmt;

    public function __construct($dsn = "mysql:host=localhost;dbname=heroes;user=root") {

        $this->conn = new PDO($dsn);
        $this->conn->exec("set names utf8");
        $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    }


    public function query($query, $params= []) {
        $this->stmt = $this->conn->prepare($query);
        $this->stmt->execute($params);
        //return $stmt;
        return $this;
    }


    public function find() {
        return $this->stmt->fetch();
    }


    public function findOrFail() {
        $result = $this->find();
        if(!$result) {
            abort();
        }
        return $result;
    }
    

    public function get() {
        $result = $this->stmt->fetchAll();
        return $result;
    }

}