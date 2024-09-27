<?php
// models/ArticleModel.php

class ArticleModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Lấy thông tin chi tiết bài viết theo ID
    public function getArticleById($id) {
        $query = "
            SELECT baiviet.tieude, baiviet.ten_bhat, baiviet.tomtat, baiviet.noidung, baiviet.hinhanh, 
                   theloai.ten_tloai, tacgia.ten_tgia
            FROM baiviet
            JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai
            JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia
            WHERE baiviet.ma_bviet = ?
        ";
        if ($stmt = mysqli_prepare($this->db, $query)) {
            mysqli_stmt_bind_param($stmt, 'i', $id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            return mysqli_fetch_assoc($result);
        } else {
            return null;
        }
    }
}

?>
