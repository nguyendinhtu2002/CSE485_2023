<?php

require_once 'C:\xampp\htdocs\CSE485_2023\BTTH02\model\Connect.php';

class StudenController
{


    public function getALL()
    {
        $conect = new Connect();

        $stmt = $conect->query('SELECT * FROM students');
        $students = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        echo $students;

    }
}