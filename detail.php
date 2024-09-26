<?php
// Điều hướng đến controller và view chi tiết bài viết

// Kết nối cơ sở dữ liệu
include 'configs/db.php';

// Nhúng controller
require_once 'controllers/ArticleController.php';

// Lấy id từ URL
$id = isset($_GET['id']) ? $_GET['id'] : 0;

// Khởi tạo controller và gọi phương thức hiển thị chi tiết bài viết
$articleController = new ArticleController($db);
$articleController->showDetail($id);
?>
