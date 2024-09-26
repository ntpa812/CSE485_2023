<?php
// Kết nối tới cơ sở dữ liệu
require_once 'configs/db.php'; // Đảm bảo kết nối CSDL đúng

// Bắt giá trị controller và action từ URL
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'Home';
$action     = isset($_GET['action']) ? $_GET['action'] : 'index';

// Chuẩn hóa tên trước khi gọi
$controller = ucfirst($controller) . 'Controller';
$controllerPath = 'controllers/' . $controller . '.php';

// Kiểm tra sự tồn tại của controller
if (!file_exists($controllerPath)) {
    die('Lỗi! Controller này không tồn tại');
}
require_once($controllerPath); // Nhúng file controller

// Tạo đối tượng và gọi hàm của Controller
$myObj = new $controller($db); // Truyền $db vào constructor của controller
if (method_exists($myObj, $action)) {
    $myObj->$action(); // Gọi action từ Controller
} else {
    die('Lỗi! Action này không tồn tại');
}
