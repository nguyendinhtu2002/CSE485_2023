<?php

use Controllers\StudentDAO;

include_once '../controller/StudentDAO.php';
include_once '../model/Student.php';
$studentDAO = new StudentDAO();

$id = $_POST['id'] ?? null;
if ($id) {
    $data = $studentDAO->getById($id);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["name"]) && isset($_POST["age"]) && isset($_POST["grade"])) {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $age = $_POST["age"];
    $grade = $_POST["grade"];

    // $student = new Student($name, $age, $grade, $id);
    $result = $studentDAO->updateStudentGrade($id, $grade);
    if ($result) {
        header("Location: index.php");
        exit();
    } else {
        echo "Update failed";
    }
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>

    <body>
        <h1 style="text-align: center;color: blue;">Student Edit</h1>

        <h2 style="color: blue;">Edit</h2>
        <form action="update-student.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $data->getId(); ?>">
            <label>Name:</label>
            <input type="text" name="name" value="<?php echo $data->getName(); ?>">
            <label>Age:</label>
            <input type="text" name="age" value="<?php echo $data->getAge(); ?>">
            <label>Grade:</label>
            <input type="text" name="grade" value="<?php echo $data->getGrade(); ?>">
            <input type="submit" value="Save">
            <a href="list-student.php">Cancel</a>
        </form>

    </body>


</html>

<?php ?>