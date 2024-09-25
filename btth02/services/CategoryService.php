<?php

class CategoryService {
    private $db;

    public function __construct() {
        // Kết nối cơ sở dữ liệu
        include './configs/db.php';
        $this->db = $db;
    }

    public function getAllCategories() {
        // Lấy tất cả thể loại từ cơ sở dữ liệu
        $sql = "SELECT ma_tloai, ten_tloai FROM theloai";
        $result = $this->db->query($sql);
        $categories = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $categories[] = $row;
            }
        }

        return $categories;
    }

    public function addCategory($name) {
        // Thêm mới thể loại
        $sql = "INSERT INTO theloai (ten_tloai) VALUES ('$name')";
        $this->db->query($sql);
    }
}
?>
