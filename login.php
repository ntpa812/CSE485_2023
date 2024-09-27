<?php
// login.php

include 'configs/db.php'; // Kết nối cơ sở dữ liệu
include 'controllers/LoginController.php'; // Nhúng controller

$loginController = new LoginController($db); // Khởi tạo đối tượng LoginController

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $loginController->login(); // Xử lý đăng nhập
} else {
    $loginController->showLoginForm(); // Hiển thị form đăng nhập
}
?>
