<?php
include '../configs/db.php'; // Hoặc đường dẫn tương ứng với tệp db.php

class Author {
    private $conn;

    public function __construct() {
        // Kết nối cơ sở dữ liệu
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function getAllAuthors() {
        // Truy vấn lấy danh sách tác giả
        $sql = "SELECT ma_tgia, ten_tgia FROM tacgia";
        $result = $this->conn->query($sql);

        return $result; // Trả về kết quả
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
