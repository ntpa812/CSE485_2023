<?php
require_once './configs/db.php'; // Kết nối cơ sở dữ liệu

class Article {
    private $conn;

    public function __construct($db) {
        $this->conn = $db; // Nhận kết nối cơ sở dữ liệu từ service
    }

    // Lấy tất cả bài viết từ cơ sở dữ liệu
    public function getAllArticles() {
        $sql = "SELECT baiviet.ma_bviet, baiviet.tieude, baiviet.tomtat, baiviet.ngayviet, 
                       baiviet.ten_bhat, tacgia.ten_tgia, theloai.ten_tloai 
                FROM baiviet 
                JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia
                JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai
                ORDER BY baiviet.ma_bviet ASC";
        $result = $this->conn->query($sql);

        $articles = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $articles[] = $row;
            }
        }
        return $articles;
    }

    // Thêm một bài viết mới vào cơ sở dữ liệu
    public function addArticle($title, $summary, $date, $songName, $authorId, $categoryId) {
        // Get the maximum article ID from the database
        $sql = "SELECT MAX(ma_bviet) AS max_id FROM baiviet";
        $result = $this->conn->query($sql);
        $row = $result->fetch_assoc();
        $maxId = $row['max_id'];
    
        // Assign the new article ID as the maximum ID plus one
        $newArticleId = $maxId + 1;
    
        // Insert the new article into the database
        $sql = "INSERT INTO baiviet (ma_bviet, tieude, tomtat, ngayviet, ten_bhat, ma_tgia, ma_tloai) 
                VALUES ('$newArticleId', '$title', '$summary', '$date', '$songName', '$authorId', '$categoryId')";
        return $this->conn->query($sql);
    }

    // Tìm bài viết theo mã bài viết (sẽ dùng cho việc sửa và xóa)
    public function getArticleById($articleId) {
        $sql = "SELECT * FROM baiviet WHERE ma_bviet = '$articleId'";
        $result = $this->conn->query($sql);
        return $result->fetch_assoc(); // Trả về một mảng kết quả
    }

    // Lấy mã tác giả theo tên bài hát
    public function getAuthorIdBySongName($songName) {
        // Implement logic to retrieve author id based on song name
        // For example, you can use a database query or a lookup table
        // Replace the following line with your actual implementation
        $authorId = 1; // Placeholder value, replace with actual logic
        return $authorId;
    }
    
    // Lấy mã thể loại theo tên bài hát
    public function getCategoryIdBySongName($songName) {
        // Implement logic to retrieve category id based on song name
        // For example, you can use a database query or a lookup table
        // Replace the following line with your actual implementation
        $categoryId = 1; // Placeholder value, replace with actual logic
        return $categoryId;
    }

    // Cập nhật bài viết theo mã bài viết
    public function updateArticle($articleId, $title, $summary, $date, $songName, $authorId, $categoryId) {
        $sql = "UPDATE baiviet 
                SET tieude = '$title', tomtat = '$summary', ngayviet = '$date', ten_bhat = '$songName', ma_tgia = '$authorId', ma_tloai = '$categoryId'
                WHERE ma_bviet = '$articleId'";
        return $this->conn->query($sql);
    }

    // Xóa bài viết theo mã bài viết
    public function deleteArticle($articleId) {
        $sql = "DELETE FROM baiviet WHERE ma_bviet = '$articleId'";
        return $this->conn->query($sql);
    }
}
?>
