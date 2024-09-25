<?php
include_once '../models/Admin.php';

class AdminService {
    private $db;

    public function __construct() {
        $this->db = new Database(); // Giả sử bạn có lớp Database để kết nối
    }

    public function getStatistics() {
        $counts = [];

        // Lấy số lượng thể loại
        $sql = "SELECT COUNT(ma_tloai) AS count FROM theloai";
        $result = $this->db->query($sql);
        $counts['categories'] = $result->fetch_assoc()['count'];

        // Lấy số lượng tác giả
        $sql = "SELECT COUNT(ma_tgia) AS count FROM tacgia";
        $result = $this->db->query($sql);
        $counts['authors'] = $result->fetch_assoc()['count'];

        // Lấy số lượng bài viết
        $sql = "SELECT COUNT(ma_bviet) AS count FROM baiviet";
        $result = $this->db->query($sql);
        $counts['articles'] = $result->fetch_assoc()['count'];

        // Lấy số lượng người dùng
        $sql = "SELECT COUNT(user_id) AS count FROM users";
        $result = $this->db->query($sql);
        $counts['users'] = $result->fetch_assoc()['count'];

        return $counts;
    }
}

?>
