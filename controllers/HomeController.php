<?php
require_once __DIR__ . '/../services/SongService.php';
require_once './configs/db.php'; // Kết nối cơ sở dữ liệu

class HomeController {
    private $db;
    private $songService;

    public function __construct($db) {
        // Khởi tạo SongService
        $this->db = $db;
        $this->songService = new SongService($db);
    }

    // Action để hiển thị trang chủ
    public function index() {
        // Gọi service để lấy dữ liệu top bài hát
        $topSongs = $this->songService->getTopSongs(5);

        // Nhúng view trang chủ và truyền dữ liệu
        include './views/home/index.php';
    }
}
?>
