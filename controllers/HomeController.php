<?php

require_once 'controllers/SongController.php';
require_once 'controllers/SearchController.php'; // Nhúng SearchController

class HomeController {
    private $db;

    // Hàm khởi tạo nhận kết nối cơ sở dữ liệu
    public function __construct($db) {
        $this->db = $db;
    }

    // Action hiển thị trang chủ
    public function index() {

        $current_page = 'home';
        // Khởi tạo đối tượng SongController
        $songController = new SongController($this->db);
        $songs = $songController->getSongs(); // Lấy dữ liệu bài hát

        // Bao gồm view để hiển thị
        include 'views/home/index.php';
    }

    // Phương thức tìm kiếm
    public function search() {
        if (isset($_GET['query'])) {
            $query = $_GET['query'];

            // Khởi tạo đối tượng SearchController và gọi phương thức search
            $searchController = new SearchController($this->db);
            $searchController->search($query);
        } else {
            // Nếu không có truy vấn tìm kiếm, có thể chuyển hướng về trang chủ hoặc thông báo lỗi
            header("Location: index.php?controller=home&action=index");
            exit();
        }
    }
}
?>
