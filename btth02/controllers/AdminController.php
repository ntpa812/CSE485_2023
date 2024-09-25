<?php
include_once '../services/AdminService.php';

class AdminController {
    private $adminService;

    public function __construct() {
        $this->adminService = new AdminService();
    }

    public function index() {
        // Lấy dữ liệu từ AdminService
        $counts = $this->adminService->getStatistics();

        // Truyền dữ liệu sang view
        include '../views/admin/Admin.php';
    }
}
?>
