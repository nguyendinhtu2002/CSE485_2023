<?php
class StudentController
{
    private $students;

    public function __construct()
    {
        $this->students = [];
    }

    public function index()
    {
        // Đọc dữ liệu từ file JSON và lưu vào mảng $students
        $json = file_get_contents('students.json');
        $this->students = json_decode($json, true);

        // Hiển thị danh sách sinh viên lên trang web
        // ...
    }

    public function create()
    {
        // Lấy dữ liệu từ form và tạo đối tượng Sinh viên mới
        $student = new stdClass();
        $student->id = count($this->students) + 1;
        $student->name = $_POST['name'];
        $student->email = $_POST['email'];
        $student->phone = $_POST['phone'];

        // Thêm đối tượng Sinh viên mới vào mảng $students
        $this->students[] = $student;

        // Lưu lại dữ liệu vào file JSON
        $json = json_encode($this->students);
        file_put_contents('students.json', $json);

        // Chuyển hướng đến trang danh sách sinh viên
        // ...
    }

    public function edit($id)
    {
        // Tìm sinh viên có ID tương ứng trong mảng $students
        $student = null;
        foreach ($this->students as $s) {
            if ($s->id == $id) {
                $student = $s;
                break;
            }
        }

        if ($student != null) {
            // Cập nhật thông tin sinh viên và lưu lại vào file JSON
            $student->name = $_POST['name'];
            $student->email = $_POST['email'];
            $student->phone = $_POST['phone'];

            $json = json_encode($this->students);
            file_put_contents('students.json', $json);
        }

        // Chuyển hướng đến trang danh sách sinh viên
        // ...
    }

    public function delete($id)
    {
        // Xóa sinh viên có ID tương ứng khỏi mảng $students
        $this->students = array_filter($this->students, function ($s) use ($id) {
            return $s->id != $id;
        });

        // Lưu lại dữ liệu vào file JSON
        $json = json_encode($this->students);
        file_put_contents('students.json', $json);

        // Chuyển hướng đến trang danh sách sinh viên
        // ...
    }
}