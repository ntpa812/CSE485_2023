<?php
// controllers/ArticleController.php

require_once 'models/ArticleModel.php'; // Gọi model tương ứng

// controllers/ArticleController.php

// controllers/ArticleController.php
class ArticleController {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function detail($id) {
        // Lấy chi tiết bài viết từ cơ sở dữ liệu
        $query = "SELECT * FROM baiviet 
                    join theloai on baiviet.ma_tloai=theloai.ma_tloai
                    join tacgia on baiviet.ma_tgia=tacgia.ma_tgia WHERE ma_bviet = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $id); // Ràng buộc ID như một số nguyên
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $article = $result->fetch_assoc();
            include 'views/article/detail.php'; // Hiển thị bài viết
        } else {
            echo "Bài viết không tồn tại!";
        }

        $stmt->close();
    }
}



?>
