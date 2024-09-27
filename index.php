<?php
require_once 'configs/db.php'; // Kết nối cơ sở dữ liệu

// B1: Bắt giá trị controller và action
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'home';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

// Kiểm tra nếu action là 'detail', cần truyền tham số id
$id = isset($_GET['id']) ? $_GET['id'] : null; // Lấy id từ URL nếu có

// Chuẩn hóa tên controller
$controller = ucfirst($controller) . 'Controller';
$controllerPath = 'controllers/' . $controller . '.php';

// Kiểm tra tồn tại controller
if (!file_exists($controllerPath)) {
    die('Lỗi! Controller này không tồn tại');
}
require_once($controllerPath);

// B4: Tạo đối tượng và gọi hàm của Controller
// Truyền $db vào constructor của Controller
$myObj = new $controller($db); // Truyền $db khi khởi tạo controller

// Kiểm tra nếu phương thức $action tồn tại trong controller
if (method_exists($myObj, $action)) {
    if ($action === 'detail' && $id !== null) {
        // Gọi action 'detail' với tham số id
        $myObj->$action($id);
    } else {
        // Gọi các action khác mà không có tham số
        $myObj->$action();
    }
} else {
    die('Lỗi! Action này không tồn tại');
}
?>
