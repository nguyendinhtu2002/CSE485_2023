<?php

require_once 'C:\xampp\htdocs\CSE485_2023\BTTH02\model\Connect.php';


class CourseController
{

    public function getCourseAll()
    {
        $con = new Connect();
        $pdo = $con->getPDO();

        $query = "SELECT * FROM courses";
        $statement = $pdo->query($query);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        print_r($result);

    }
}