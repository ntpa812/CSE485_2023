<?php
require_once 'models/ArticleModel.php';

class ArticleController {
    private $model;

    public function __construct($db) {
        $this->model = new ArticleModel($db);
    }

    public function showDetail($id) {
        // Lấy dữ liệu từ model
        $article = $this->model->getArticleById($id);

        // Kiểm tra nếu bài viết không tồn tại
        if (!$article) {
            echo "Bài viết không tồn tại!";
            return;
        }

        // Gửi dữ liệu sang view
        include 'views/article/detail.php';
    }
}
?>
