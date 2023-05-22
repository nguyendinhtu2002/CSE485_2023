<?php
require_once 'C:\xampp\htdocs\CSE485_2023\BTTH02\model\Connect.php';



class LoginController
{

    public function login()
    {
        $con = new Connect();
        if (isset($_POST['btnLogin'])) {
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            try {
                if (empty($email) || empty($password)) {
                    echo "<script>alert('Please enter your email and pasword');</script>";
                } else {
                    $pdo = $con->getPDO();
                    $sql = "SELECT * FROM users WHERE email = ? AND password = ?";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([$email, $password]);
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);

                    if ($result) {
                        // Login successful
                        session_start();
                        $_SESSION['userId'] = $result['id'];
                        // Redirect to the desired page
                        header('Location: index.php');
                        exit;
                    } else {
                        // Login failed
                        echo "That bai";
                        // echo "<script>alert('Invalid email or password');</script>";
                    }


                }
            } catch (err) {

            }
        }
    }
}