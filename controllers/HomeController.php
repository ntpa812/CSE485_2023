<?php
// controllers/HomeController.php

// Đảm bảo đã nhúng SongController
require_once 'controllers/SongController.php'; 

class HomeController {
    private $db;

    // Hàm khởi tạo nhận kết nối cơ sở dữ liệu
    public function __construct($db) {
        $this->db = $db;
    }

    // Action hiển thị trang chủ
    public function index() {
        // Khởi tạo đối tượng SongController và lấy dữ liệu top bài hát
        $songController = new SongController($this->db);
        $topSongs = $songController->getTopSongsData(); // Lấy dữ liệu từ phương thức trong SongController

        // Bao gồm view để hiển thị
        include 'views/home/index.php';
    }

    // Các action khác như showTopSongs, search, etc.
}
