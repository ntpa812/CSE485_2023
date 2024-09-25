<?php
// controllers/SongController.php
require_once '../../models/SongModel.php';

class SongController {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function showTopSongs() {
        // Truy vấn lấy dữ liệu từ bảng `baiviet`
        $query = "SELECT * FROM baiviet LIMIT 5";  // Bạn có thể điều chỉnh truy vấn tùy theo nhu cầu
        $result = $this->db->query($query);

        $songs = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $songs[] = $row;  // Lưu từng bản ghi vào mảng $songs
            }
        }

        // Truyền mảng $songs cho view
        include '../../views/home/top_songs.php';  // Đảm bảo view đang được nhúng sau khi có dữ liệu
    }
}


?>
