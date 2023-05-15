<?php

class UserController
{
    private $host = 'localhost:8080';
    private $dbname = 'mydatabase';
    private $username = 'myusername';
    private $password = 'mypassword';
    public function index()
    {
        $dbh = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
        $stmt = $dbh->prepare("SELECT * FROM user ");

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo $results;
    }
}