<?php
require_once './models/Author.php'; // Gọi model
require_once './services/AuthorService.php';
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

    // Phương thức thêm tác giả
    public function add() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['ten_tgia'];
            $image = $_POST['hinh_tgia'];
            $this->authorModel->addAuthor($name, $image);
            header('Location: index.php?controller=author&action=index');
        } else {
            require_once './views/author/add_author.php';
        }
    }

    // Phương thức sửa tác giả
    public function edit() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['ma_tgia'];
            $name = $_POST['ten_tgia'];
            $image = $_POST['hinh_tgia'];
            $this->authorModel->editAuthor($id, $name, $image);
            header('Location: index.php?controller=author&action=index');
        } else {
            $id = $_GET['ma_tgia'];
            $author = $this->authorModel->getAuthorById($id);
            require_once './views/author/edit_author.php';
        }
    }

    // Phương thức xóa tác giả
    public function delete() {
        $id = $_GET['ma_tgia'];
        $this->authorModel->deleteAuthor($id);
        header('Location: index.php?controller=author&action=index');
    }
}
?>
