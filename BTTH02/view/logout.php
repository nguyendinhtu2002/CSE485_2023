<?php
session_start();

// Xóa toàn bộ session
session_unset();
session_destroy();

// Chuyển hướng đến trang login
header("Location: login.php");
exit();
?>