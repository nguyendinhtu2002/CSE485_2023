<?php
require_once 'C:\xampp\htdocs\CSE485_2023\BTTH02\controller\StudentController.php';
session_start();

$data = new StudenController();
$userId = $_SESSION['userId'];

$data->getCourseById($userId);