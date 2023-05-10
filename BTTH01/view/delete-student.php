<?php
use Controllers\StudentDAO;

include_once '../controller/StudentDAO.php';
include_once '../model/Student.php';
$studentDAO = new StudentDAO();
$id = $_POST['id'] ?? null;
if ($id) {
    $data = $studentDAO->delete($id);
}
?>