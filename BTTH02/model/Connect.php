<?php

class Connect
{
    private $host = 'localhost';
    private $dbname = 'tlu';
    private $username = 'root';
    private $password = '';
    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
    }
    
    public function getPDO()
    {
        return $this->pdo;
    }
    
}