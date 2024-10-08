<?php
include 'configs/db.php'; // Hoặc đường dẫn tương ứng với tệp db.php

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

    public function getAuthorById($ma_tgia) {
        $sql = "SELECT * FROM tacgia WHERE ma_tgia = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $ma_tgia);
        $stmt->execute();
        $result = $stmt->get_result();
        
        // Trả về mảng kết hợp từ kết quả truy vấn
        return $result->fetch_assoc();
    }

    public function addAuthor($name, $image) {
        $sql_max_id = "SELECT MAX(ma_tgia) AS max_id FROM tacgia";
        $result = $this->conn->query($sql_max_id);
        $row = $result->fetch_assoc();
        $new_author_id = ($row['max_id'] !== null) ? $row['max_id'] + 1 : 1;
    
        $sql = "INSERT INTO tacgia (ma_tgia, ten_tgia, hinh_tgia) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("iss", $new_author_id, $name, $image);
        return $stmt->execute();
    }

    public function editAuthor($id, $name, $image) {
        $sql = "UPDATE tacgia SET ten_tgia = ?, hinh_tgia = ? WHERE ma_tgia = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssi", $name, $image, $id);
        return $stmt->execute();
    }
    
    public function deleteAuthor($id) {
        $sql = "DELETE FROM tacgia WHERE ma_tgia = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }
}
?>
