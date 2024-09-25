<?php
require_once './models/Author.php'; // Gọi model
require_once './configs/db.php'; // Kết nối cơ sở dữ liệu

class AuthorController {
    private $authorModel;

    public function __construct() {
        global $db; // Sử dụng biến $conn từ db.php
        $this->authorModel = new Author($db); // Tạo instance của model
    }
    // Phương thức hiển thị danh sách tác giả
    public function index() {
        // Lấy dữ liệu từ model
        $authors = $this->authorModel->getAllAuthors();
        
        // Gửi dữ liệu cho view để hiển thị
        require_once './views/author/list_author.php';
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
