<?php
include 'G:/xampp/htdocs/btth02/configs/db.php'; // Hoặc đường dẫn tương ứng với tệp db.php

class Admin {
    private $conn;

    // Hàm khởi tạo nhận kết nối cơ sở dữ liệu
    public function __construct($db) {
        $this->conn = $db;
    }
    
    // Đếm số lượng người dùng
    public function countUsers() {
        $sql = "SELECT COUNT(user_id) AS count_users FROM users";
        $result = $this->conn->query($sql);
        return $result->fetch_assoc()['count_users'];
    }

    // Đếm số lượng thể loại
    public function countCategories() {
        $sql = "SELECT COUNT(ma_tloai) AS count_theloai FROM theloai";
        $result = $this->conn->query($sql);
        return $result->fetch_assoc()['count_theloai'];
    }

    // Đếm số lượng tác giả
    public function countAuthors() {
        $sql = "SELECT COUNT(ma_tgia) AS count_tacgia FROM tacgia";
        $result = $this->conn->query($sql);
        return $result->fetch_assoc()['count_tacgia'];
    }

    // Đếm số lượng bài viết
    public function countArticles() {
        $sql = "SELECT COUNT(ma_bviet) AS count_baiviet FROM baiviet";
        $result = $this->conn->query($sql);
        return $result->fetch_assoc()['count_baiviet'];
    }
}
?>
