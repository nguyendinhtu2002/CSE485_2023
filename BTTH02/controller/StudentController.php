<?php

require_once 'C:\xampp\htdocs\CSE485_2023\BTTH02\model\Connect.php';

class StudenController
{


    public function getALL()
    {
        $conect = new Connect();

        $pdo = $conect->getPDO();

        // Thực hiện các truy vấn SQL sử dụng kết nối PDO
        $query = "SELECT * FROM students";
        $statement = $pdo->query($query);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        print_r($result);

    }
    public function getDetails($id)
    {
        $connect = new Connect();

        $pdo = $connect->getPDO();

        $query = "SELECT * FROM students WHERE id = :id";

        $statement = $pdo->prepare($query);
        $statement->bindParam(':id', $id);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        print_r($result);
    }
    public function updateStudent($id, $name, $birth, $email)
    {
        $connect = new Connect();

        $pdo = $connect->getPDO();
        $sql = "UPDATE students SET name=?, birth=?, email=? WHERE id=?";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(1, $name);
        $stmt->bindParam(2, $birth);
        $stmt->bindParam(3, $email);
        $stmt->bindParam(4, $id);

        if ($stmt->execute()) {
            echo "Update successful.";
        } else {
            echo "Update failed.";
        }
    }
    public function getCourseById($id)
    {
        // SELECT c.id,c.title,c.description FROM student_courses sc JOIN courses c ON sc.course_id = c.id WHERE sc.student_id = 1 ;

        $connect = new Connect();

        $pdo = $connect->getPDO();

        $sql = "SELECT c.id, c.name, c.description
        FROM student_courses sc
        JOIN courses c ON sc.course_id = c.id
        WHERE sc.student_id = :student_id";

        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':student_id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        print_r($result);

    }

}