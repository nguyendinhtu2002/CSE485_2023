<?php

use Controllers\StudentDAO;

include_once '..\controller\StudentDAO.php';
include_once '..\model\Student.php';
$student = new StudentDAO();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $age = $_POST["age"];
    $student ->create($name,$age);
    // echo $name,$age,$grade;

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
        <h1 style="text-align: center;color: blue;margin: 4rem 4rem">Student ADD</h1>
        <form id="product-form" method="POST" style="text-align:center">
            <label for="product-name" style="font-size:24px;margin-right:1rem">Name:</label>
            <input type="text" id="name" name='name' required>
            <label for="product-price" style="font-size:24px;margin-right:1rem">Age:</label>
            <input type="text" id="age" name='age' required>
            <button class="button" id="save-button" type="submit">Save</button>
            <button class="button" id="cancel-button" type="button"><a href='index.php' style="text-decoration:none;color:aliceblue">Cancel</a></button>
        </form>  
        

    </body>


</html>

<?php 
?>