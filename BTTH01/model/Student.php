<?php
namespace Models;

class Student
{
    private $id;
    private $name;

    private $age;
    private $grade;

    public function __construct()
    {
        $this->id = 0;
        $this->name = "";
        $this->grade = "";
        $this->age = "";
    }
    // Hàm khởi tạo
    public function __construct2($id, $name, $grade, $age)
    {
        $this->id = $id;
        $this->name = $name;
        $this->grade = $grade;
        $this->age = $age;

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
    public function getAge()
    {
        return $this->age;
    }

    public function setAge($age)
    {
        $this->age = $age;
    }
    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }


    public function getGrade()
    {
        return $this->grade;
    }

    public function setgrade($grade)
    {
        $this->grade = $grade;
    }
    public function __toString()
    {
        return "Student[ID={$this->id}, NAME={$this->name}, AGE={$this->age}]";
    }
}