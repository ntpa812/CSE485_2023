<?php
include './services/AdminService.php';
class AdminController {
    private $adminService;

    public function __construct() {
        // Khởi tạo đối tượng AdminService
        $this->adminService = new AdminService();
    }

    public function index() {
        // Gọi phương thức getStatistics từ đối tượng adminService
        $counts = $this->adminService->getStatistics();

        // Truyền dữ liệu vào view
        include 'views/admin/Admin.php';
    }
}
