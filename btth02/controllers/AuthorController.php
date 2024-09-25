<?php
class AuthorController {
    private $authorService;

    public function __construct() {
        $this->authorService = new AuthorService();
    }

    public function listAuthors() {
        // Gọi AuthorService để lấy danh sách tác giả
        $authors = $this->authorService->getAllAuthors();
        
        // Kiểm tra xem dữ liệu có được trả về không và truyền sang View
        if ($authors) {
            include '../views/author/list_author.php'; // Hiển thị view
        } else {
            echo "Lỗi: Không thể lấy danh sách tác giả.";
        }
    }

    public function addAuthor() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['ten_tgia'];
            $image = $_POST['hinh_tgia']; // Có thể thêm xử lý upload hình ảnh
            $this->authorService->addAuthor($name, $image);
            header('Location: index.php?controller=author&action=list');
        } else {
            include '../views/author/add_author.php';
        }
    }

    public function deleteAuthor() {
        $id = $_GET['ma_tgia'];
        $this->authorService->deleteAuthor($id);
        header('Location: index.php?controller=author&action=list');
    }
}
?>
