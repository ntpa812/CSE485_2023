<?php
require_once './models/Article.php'; // Gọi model
require_once './services/ArticleService.php';
require_once './configs/db.php'; // Kết nối cơ sở dữ liệu
class ArticleController {
    private $articleService;
    private $db;


    public function __construct($db) {
        // Khởi tạo ArticleService
        $this->articleService = new ArticleService();

        $this->db = $db;

    }

    // Hiển thị danh sách bài viết
    public function index() {
        $articles = $this->articleService->getAllArticles();
        include 'views/article/list_article.php';
    }

    // Thêm bài viết mới
    public function add() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $title = $_POST['tieude'];
            $summary = $_POST['tomtat'];
            $songName = $_POST['ten_bhat'];
            $authorId = $this->articleService->getAuthorIdBySongName($songName);
            $categoryId = $this->articleService->getCategoryIdBySongName($songName);
            $date = date('Y-m-d'); // Tạo ngày viết tự động
    
            // Gọi service để thêm bài viết mới
            $this->articleService->addArticle($title, $summary, $date, $songName, $authorId, $categoryId);
            header('Location: index.php?controller=article&action=index');
        } else {
            include 'views/article/add_article.php';
        }
    }

    // Sửa bài viết (cần thêm form view `edit_article.php`)
    public function edit() {
        $articleId = $_GET['ma_bviet'];
        $article = $this->articleService->getArticleById($articleId);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $title = $_POST['tieude'];
            $summary = $_POST['tomtat'];
            $songName = $_POST['ten_bhat'];
            $authorId = $this->articleService->getAuthorIdBySongName($songName);
            $categoryId = $this->articleService->getCategoryIdBySongName($songName);
            $date = date('Y-m-d'); // Tạo ngày viết tự động

            // Gọi service để cập nhật bài viết
            $this->articleService->updateArticle($articleId, $title, $summary, $date, $songName, $authorId, $categoryId);
            header('Location: index.php?controller=article&action=index');
        } else {
            include 'views/article/edit_article.php';
        }
    }

    // Xóa bài viết
    public function delete() {
        $articleId = $_GET['ma_bviet'];
        $this->articleService->deleteArticle($articleId);
        header('Location: index.php?controller=article&action=index');
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
