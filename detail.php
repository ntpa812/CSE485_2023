<?php
// index.php

require_once 'configs/db.php'; // Gọi file kết nối database
require_once 'controllers/ArticleController.php'; // Gọi file controller

// Tạo kết nối database
// $db = new mysqli($host, $username, $password, $dbname);

// Kiểm tra kết nối
if ($db->connect_error) {
    die("Kết nối thất bại: " . $db->connect_error);
}

// Lấy controller và action từ URL, mặc định là 'article' và 'detail'
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'article';
$action = isset($_GET['action']) ? $_GET['action'] : 'detail';
$id = isset($_GET['id']) ? $_GET['id'] : 0;

// Điều hướng tới controller và action tương ứng
if ($controller == 'article') {
    $articleController = new ArticleController($db);
    if ($action == 'detail') {
        $articleController->detail($id); // Hiển thị chi tiết bài viết
    }
    // Thêm các action khác nếu cần
}

$db->close(); // Đóng kết nối database

?>