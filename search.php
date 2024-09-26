<?php
// search.php

// Kết nối cơ sở dữ liệu
include 'configs/db.php';

// Nhúng controller
require_once 'controllers/SearchController.php';

// Lấy từ khóa tìm kiếm từ URL
$searchQuery = isset($_GET['query']) ? trim($_GET['query']) : '';

// Kiểm tra nếu không có từ khóa tìm kiếm
if (empty($searchQuery)) {
    echo "Vui lòng nhập từ khóa tìm kiếm!";
    exit;
}

// Khởi tạo controller và gọi phương thức tìm kiếm
$searchController = new SearchController($db);
$searchController->search($searchQuery);
?>
