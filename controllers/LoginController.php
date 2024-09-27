<?php
// controllers/LoginController.php

include 'models/User.php';

class LoginController {
    private $userModel;

    public function __construct($db) {
        $this->userModel = new User($db);
    }

    public function login() {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);

            $user = $this->userModel->findUserByUsername($username);

            if ($user && password_verify($password, $user['password'])) {
                // Đăng nhập thành công
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];

                // Chuyển hướng dựa trên vai trò
                if ($user['role'] === 'admin') {
                    header("Location: admin/index.php");
                } else {
                    header("Location: index.php");
                }
                exit();
            } else {
                // Đăng nhập thất bại
                $_SESSION['error_message'] = 'Tên đăng nhập hoặc mật khẩu không đúng!';
                header("Location: login.php"); // Chuyển hướng trở lại trang đăng nhập
                exit();
            }
        }
    }

    public function showLoginForm() {
        include 'views/login/login_form.php';
    }
}
?>
