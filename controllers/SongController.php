<?php
    // controllers/SongController.php

class SongController {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Phương thức để lấy dữ liệu các bài hát
    public function getSongs() {
        $query = "SELECT ten_bhat, hinhanh, ma_bviet FROM baiviet order by ngayviet desc limit 5"; // Câu truy vấn lấy tất cả bài hát
        $result = $this->db->query($query);

        $songs = [];
        while ($row = $result->fetch_assoc()) {
            $songs[] = $row; // Thêm bài hát vào mảng
        }

        return $songs; // Trả về mảng bài hát
    }
}

?>