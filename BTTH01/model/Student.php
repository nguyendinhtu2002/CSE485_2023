<?php
class Student
{
    private $id;
    private $name;
    private $email;
    private $grade;

    // Hàm khởi tạo
    public function __construct($id, $name, $email, $grade)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->grade = $grade;
    }

    // Getter và setter cho các thuộc tính
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getGrade()
    {
        return $this->grade;
    }

    public function setgrade($grade)
    {
        $this->grade = $grade;
    }
}