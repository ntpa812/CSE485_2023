<?php
require_once './models/Admin.php';
require_once './configs/db.php'; // Kết nối cơ sở dữ liệu

class AdminController {
    private $adminService;

    public function __construct() {
        global $db; // Sử dụng biến $conn từ db.php
        $this->authorModel = new Admin($db); // Tạo instance của model
    }

    public function index() {
        // Lấy dữ liệu từ AdminService
        $counts = $this->adminService->getStatistics();

        // Truyền dữ liệu sang view
        require_once '../views/admin/Admin.php';
    }
}
?>
