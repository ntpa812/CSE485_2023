<?php
// controllers/ArticleController.php

require_once 'models/ArticleModel.php'; // Gọi model tương ứng

class ArticleController {
    private $articleModel;

    public function __construct($db) {
        $this->articleModel = new ArticleModel($db);
    }

    // Phương thức hiển thị chi tiết bài viết
    public function detail($id) {
        $article = $this->articleModel->getArticleById($id);
        if ($article) {
            include 'views/article/detail.php'; // Gọi view để hiển thị dữ liệu
        } else {
            echo "Bài viết không tồn tại!";
        }
    }
}

?>
