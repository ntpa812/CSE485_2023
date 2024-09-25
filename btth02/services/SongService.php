<?php

class SongService {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Lấy danh sách top bài hát
    public function getTopSongs($limit = 5) {
        $query = "SELECT * FROM baiviet LIMIT ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $limit);
        $stmt->execute();
        $result = $stmt->get_result();

        $songs = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $songs[] = $row;
            }
        }

        return $songs;
    }

    // Lấy chi tiết bài hát theo ID
    public function getSongById($id) {
        $query = "SELECT * FROM baiviet WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();  // Trả về chi tiết bài hát
        }

        return null;  // Không tìm thấy bài hát
    }
}
?>
