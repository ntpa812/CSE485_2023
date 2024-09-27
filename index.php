<!-- Routing là gì? Định tuyến/Điều hướng -->
<!-- Phân tích xem: URL của người dùng > Muốn gì -->
<!-- Ví dụ: Trang chủ, Quản lý bài viết hay Thêm bài viết -->
<!-- Chuyển quyền cho Controller tương ứng điều khiển tiếp -->
<!-- URL của tôi thiết kế luôn có dạng: -->

<!-- http://localhost/btth02v2/index.php?controller=A&action=B -->
<!-- http://localhost/btth02v2/index.php -->
<!-- http://localhost/btth02v2/index.php?controller=home&action=index -->

<!-- Controller là tên của FILE controller mà chúng ta sẽ gọi -->
<!-- Action là tên cả HÀM trong FILE controller mà chúng ta gọi -->

<?php
// Kết nối tới cơ sở dữ liệu
require_once './configs/db.php'; // Nhúng file kết nối CSDL

// B1: Bắt giá trị controller và action
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'Home';
$action     = isset($_GET['action']) ? $_GET['action'] : 'index';

// B2: Chuẩn hóa tên trước khi gọi
$controller = ucfirst($controller) . 'Controller';
$controllerPath = 'controllers/' . $controller . '.php';

// B3: Kiểm tra sự tồn tại của controller
if (!file_exists($controllerPath)) {
    die('Lỗi! Controller này không tồn tại');
}
require_once($controllerPath);

// B4: Tạo đối tượng và gọi hàm của Controller
// Truyền $db vào constructor của Controller
$myObj = new $controller($db);  // Truyền $db khi khởi tạo controller
if (method_exists($myObj, $action)) {
    $myObj->$action();  // Gọi action từ Controller
} else {
    die('Lỗi! Action này không tồn tại');
}
?>