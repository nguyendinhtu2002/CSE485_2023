<?php

class ConnectDatabase{
    private $host = 'localhost';
    private $dbname = 'article';
    private $username = 'root';
    private $password = '';
    private $pdo;

    public function __construct(){

        try{
            $this->pdo = new PDO("mysql:host={$this->host};dbname={$this->dbname}",$this->username,$this->password);
        }catch(PDOException $e){
            $this->pdo = null;
        }
    }

    public function getConnection(){
        return $this->pdo;
    }


}