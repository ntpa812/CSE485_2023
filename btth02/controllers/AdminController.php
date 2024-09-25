<?php
require_once './models/Admin.php';
require_once './configs/db.php'; // Kết nối cơ sở dữ liệu

class AdminController {
    private $adminService;

    public function __construct() {
        $this->adminService = new Admin();
    }

    public function index() {
        // Lấy dữ liệu từ AdminService
        $counts = $this->adminService->getStatistics();

        // Truyền dữ liệu sang view
        include '../views/admin/Admin.php';
    }
}
?>
