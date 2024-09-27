<?php
require_once './configs/db.php'; // Kết nối cơ sở dữ liệu
require_once __DIR__ . '/../services/SongService.php';

class SongController {
    private $songService;

    public function __construct($db) {
        // Khởi tạo SongService
        $this->songService = new SongService($db);
    }

    // Hiển thị chi tiết bài hát
    public function detail() {
        // Lấy ID bài hát từ URL
        $id = isset($_GET['id']) ? $_GET['id'] : null;

        if ($id) {
            // Lấy chi tiết bài hát từ SongService
            $song = $this->songService->getSongById($id);

            if ($song) {
                // Nếu tìm thấy bài hát, nhúng view và truyền dữ liệu
                include './views/songs/detail.php';
            } else {
                echo "Không tìm thấy bài hát!";
            }
        } else {
            echo "ID bài hát không hợp lệ!";
        }
    }
}
?>
