<?php
class ArticleService {
    private $db;
    private $articleModel;

    public function __construct() {
        // Kết nối cơ sở dữ liệu
        include './configs/db.php';
        $this->db = $db;
        
        // Tạo đối tượng Article Model
        $this->articleModel = new Article($this->db);
    }

    // Lấy tất cả bài viết thông qua Article Model
    public function getAllArticles() {
        return $this->articleModel->getAllArticles();
    }

    // Thêm bài viết mới thông qua Article Model
    public function addArticle($title, $summary, $date, $songName, $authorId, $categoryId) {
        return $this->articleModel->addArticle($title, $summary, $date, $songName, $authorId, $categoryId);
    }

    // Lấy bài viết theo ID
    public function getArticleById($articleId) {
        return $this->articleModel->getArticleById($articleId);
    }

    // Cập nhật bài viết
    public function updateArticle($articleId, $title, $summary, $date, $songName, $authorId, $categoryId) {
        return $this->articleModel->updateArticle($articleId, $title, $summary, $date, $songName, $authorId, $categoryId);
    }

    // Xóa bài viết
    public function deleteArticle($articleId) {
        return $this->articleModel->deleteArticle($articleId);
    }
}
?>
