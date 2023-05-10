<?php

use Controllers\StudentDAO;

include_once '../controller/StudentDAO.php';
include_once '../model/Student.php';
$studentDAO = new StudentDAO();

$id = $_POST['id'] ?? null;
if ($id) {
    $data = $studentDAO->getById($id);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["name"]) && isset($_POST["age"])) {
    $name = $_POST["name"];
    $age = $_POST["age"];
    // $grade = $_POST["grade"];

    // $student = new Student($name, $age, $grade, $id);
    $result = $studentDAO->updateStudentGrade($id,$age);
    echo $result;
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
    <style>
        #save-button,#cancel-button{
            background-color: rebeccapurple;
            margin-left: 1rem;
            color:antiquewhite;
            font-size: 1.5rem;
            
        }
        #name,#age{
            font-size: 1.5rem;
            margin-right: 1.5rem;
        }
        body {
			background-color: bisque;
		}
        </style>
        <h1 style="text-align: center;color: blue;margin: 4rem 4rem">Student Edit</h1>
        <form action="update-student.php" method="POST" style="text-align:center">
            <input type="hidden" name="id" value="<?php echo $data->getId(); ?>">
            <label style="font-size:24px;margin-right:1rem">Name:</label>
            <input type="text" name="name" value="<?php echo $data->getName(); ?>"id='name'>
            <label style="font-size:24px;margin-right:1rem">Age:</label>
            <input type="text" name="age" value="<?php echo $data->getAge(); ?>" id='age' >
            <button class="button" id="save-button" type="submit">Save</button>
            <button class="button" id="cancel-button" type="button"><a href='index.php' style="text-decoration:none;color:aliceblue">Cancel</a></button>
        </form>

    </body>


</html>

<?php ?>