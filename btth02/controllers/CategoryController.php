<?php
require_once './models/Category.php'; // Gọi model
require_once './services/CategoryService.php';
require_once './configs/db.php'; // Kết nối cơ sở dữ liệu

class CategoryController {
    private $categoryService;

    public function __construct() {
        // Khởi tạo CategoryService để gọi các phương thức liên quan đến logic nghiệp vụ
        $this->categoryService = new CategoryService();
    }

    public function index() {
        // Lấy danh sách thể loại thông qua service
        $categories = $this->categoryService->getAllCategories();

        // Gọi view để hiển thị danh sách thể loại
        include 'views/category/list_category.php';
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['ten_tloai'];
            $this->categoryService->addCategory($name);
            header('Location: index.php?controller=category&action=index');
        } else {
            // Hiển thị form thêm mới
            include 'views/category/add_category.php';
        }
    }
}
?>
