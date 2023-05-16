<?php

class Connect
{
    private $host = 'localhost';
    private $dbname = 'tlu';
    private $username = 'root';
    private $password = '';

    public function __construct(){
        $connect = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
    }
    
}