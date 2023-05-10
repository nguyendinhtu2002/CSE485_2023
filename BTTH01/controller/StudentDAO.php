<?php

namespace Controllers;

use http\Env\Request;
use Models\Student;

class StudentDAO
{
    public function create(array $request)
    {
        $file_path = "../data/data.txt";
        $file = fopen($file_path, 'a+');

        $lines = file($file_path);
        $last_line = $lines[count($lines) - 1];
        $row = explode(",", $last_line);

        $id = $row[0] + 1;
        $name = $request['name'];
        $age = $request['age'];

        $data = "$id,$name,$age\n";
        fwrite($file, $data);
        fclose($file);
    }

    public function read()
    {
        $file_path = "../data/data.txt";
        $file = fopen($file_path, 'r');
        if ($file) {
            while (($line = fgets($file)) != false) {
                echo $line . "</br>";
            }
        }
        fclose($file);
    }

    public function getAll()
    {
        $file_path = "../data/data.txt";
        $file = fopen($file_path, 'r');
        $students = [];
        if ($file) {
            while (($line = fgets($file)) ) {
                $data = explode(',', $line);
                $id = $data[0];
                $name = $data[1];
                $age = $data[2];
                $student = new Student();
                $student->setId($id);
                $student->setName($name);
                $student->setAge($age);
                array_push($students, $student);
            }
            fclose($file); // Đóng file sau khi đọc xong.
        }
        return $students;
    }
    public function updateStudentGrade($id, $newGrade) {
        $file_path = "../data/data.txt";
        $file = fopen($file_path, 'r+');
        if (!$file) {
            
            die("Failed to open file!");
            // return false;

        }
        while (($line = fgets($file)) != false) {
            $data = explode(',', $line);
            if ($data[0] == $id) {
                $newData = $data[0] . ',' . $data[1] . ',' . $data[2] . ',' . $newGrade . PHP_EOL;
                fseek($file, -strlen($line), SEEK_CUR);
                ftruncate($file, ftell($file));
                fwrite($file, $newData);
                break;
            }
        }
        fclose($file);
        return true;
    }

    public function getById($id)
    {
        $file_path = "../data/data.txt";
        $file = fopen($file_path, 'r');
        if ($file) {
            while (($line = fgets($file)) !== false) {
                $data = explode(',', $line);
                if ($data[0] == $id) {
                    $student = new Student();
                    $student->setId($data[0]);
                    $student->setName($data[1]);
                    $student->setAge($data[2]);
                    $student->setgrade($data[3]);

                    fclose($file);
                    return $student;
                }
            }
            fclose($file); // Đóng file sau khi đọc xong.
        }
        return null;
    }

    public function delete($id)
    {
        $file_path = "../data/data.txt";
        $file = fopen($file_path, 'r+');
        if ($file) {
            $data = array();
            while (($line = fgets($file)) != false) {
                $line = trim($line);
                $row = explode(',', $line);
                if ($row[0] != $id) {
                    $data[] = $line;
                }
            }
            ftruncate($file, 0); // Xóa toàn bộ nội dung của file
            rewind($file); // Đặt con trỏ file ở đầu file
            foreach ($data as $line) {
                fwrite($file, $line . PHP_EOL);
            }
            fclose($file);
        }
    }

}