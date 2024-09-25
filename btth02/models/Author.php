<?php
include 'G:/xampp/htdocs/btth02/configs/db.php'; // Hoặc đường dẫn tương ứng với tệp db.php

class Author {
    private $conn;

    // Hàm khởi tạo nhận kết nối cơ sở dữ liệu
    public function __construct($db) {
        $this->conn = $db;
    }

    // Lấy danh sách tất cả các tác giả
    public function getAllAuthors() {
        $query = "SELECT ma_tgia, ten_tgia FROM tacgia";
        $result = $this->conn->query($query);
        return $result;
    }

    public function addAuthor($name, $image) {
        $sql = "INSERT INTO tacgia (ten_tgia, hinh_tgia) VALUES (?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("ss", $name, $image);
        $stmt->execute();
    }

    public function deleteAuthor($id) {
        $sql = "DELETE FROM tacgia WHERE ma_tgia = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }
}
?>
