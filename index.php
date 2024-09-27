<?php
require_once 'configs/db.php'; // Kết nối cơ sở dữ liệu

// B1: Bắt giá trị controller và action
// index.php
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'home';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

// Kiểm tra nếu action là 'detail', cần truyền tham số id
if ($action === 'detail' && isset($_GET['id'])) {
    $id = $_GET['id']; // Lấy id từ URL
}

// Chuẩn hóa tên controller
$controller = ucfirst($controller) . 'Controller';
$controllerPath = 'controllers/' . $controller . '.php';

// Kiểm tra tồn tại controller
if (!file_exists($controllerPath)) {
    die('Lỗi! Controller này không tồn tại');
}
require_once($controllerPath);

// Tạo đối tượng controller
$myObj = new $controller($db);

// Gọi action với tham số id nếu có
if ($action === 'detail' && isset($id)) {
    $myObj->$action($id); // Gọi hàm detail với tham số id
} else {
    $myObj->$action(); // Gọi hàm action mà không có tham số
}
