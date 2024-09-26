<?php
// controllers/SongController.php
require_once 'models/SongModel.php'; // Đảm bảo đã nhúng SongModel

class SongController {
    private $db;
    private $songModel;

    public function __construct($db) {
        $this->db = $db;
        $this->songModel = new SongModel($db); // Khởi tạo SongModel
    }

    // Phương thức trả về dữ liệu top bài hát từ Model
    public function getTopSongsData() {
        return $this->songModel->getTopSongs();
    }

    // Phương thức hiển thị top bài hát
    public function showTopSongs() {
        $songs = $this->getTopSongsData(); // Lấy dữ liệu từ Model
        include 'views/home/top_songs.php'; // Gọi view để hiển thị top bài hát
    }
}
?>
