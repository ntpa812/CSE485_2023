<?php
// index.php

require_once 'configs/db.php'; // Kết nối cơ sở dữ liệu
require_once 'controllers/LoginController.php'; // Nhúng controller cho đăng nhập
require_once 'controllers/SearchController.php'; // Nhúng controller cho tìm kiếm
require_once 'controllers/ArticleController.php'; // Nhúng controller cho bài viết
require_once 'controllers/HomeController.php'; // Nhúng controller cho trang chủ

session_start(); // Bắt đầu session

// Xác định hành động dựa trên tham số từ URL
$action = isset($_GET['action']) ? strtolower($_GET['action']) : 'home'; // Mặc định là home

// Kiểm tra nếu hành động là đăng nhập
if ($action === 'login') {
    $loginController = new LoginController($db); // Khởi tạo đối tượng LoginController

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $loginController->login(); // Xử lý đăng nhập
    } else {
        $loginController->showLoginForm(); // Hiển thị form đăng nhập
    }
} 
// Kiểm tra nếu người dùng đã đăng nhập
else if (isset($_SESSION['user_id'])) {
    // Nếu đã đăng nhập và hành động không phải là 'login', chuyển hướng đến trang chính
    if ($action === 'home') {
        $homeController = new HomeController($db);
        $homeController->index(); // Hiển thị trang chủ
    } else if ($action === 'search') {
        // Xử lý tìm kiếm
        $searchQuery = isset($_GET['query']) ? trim($_GET['query']) : '';
        if (empty($searchQuery)) {
            echo "Vui lòng nhập từ khóa tìm kiếm!";
            exit;
        }
        $searchController = new SearchController($db);
        $searchController->search($searchQuery);
    } else if ($action === 'article') {
        // Xử lý chi tiết bài viết
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        if ($id > 0) {
            $articleController = new ArticleController($db);
            $articleController->detail($id); // Hiển thị chi tiết bài viết
        } else {
            echo "ID bài viết không hợp lệ!";
        }
    } else {
        // Hành động không hợp lệ, chuyển hướng đến trang chính
        $homeController = new HomeController($db);
        $homeController->index();
    }
} else {
    // Nếu chưa đăng nhập và hành động không phải là 'login', chuyển hướng về trang đăng nhập
    if ($action !== 'login') {
        header("Location: index.php?action=login"); // Chuyển hướng đến trang đăng nhập
        exit();
    }
}

$db->close(); // Đóng kết nối cơ sở dữ liệu
?>
