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
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Handle form submission (POST request)
            $ma_tgia = $_POST['ma_tgia'];
            $ten_tgia = $_POST['ten_tgia'];
            $hinh_tgia = $_POST['hinh_tgia'];
    
            $success = $this->authorModel->editAuthor($ma_tgia, $ten_tgia, $hinh_tgia);
            if ($success) {
                header("Location: index.php?controller=author&action=index&msg=edit");
            } else {
                echo "Lỗi cập nhật tác giả.";
            }
        } else {
            // Display edit form (GET request)
            if (isset($_GET['ma_tgia'])) {
                $ma_tgia = $_GET['ma_tgia'];
                $author = $this->authorModel->getAuthorbyId($ma_tgia);
    
                if ($author) {
                    // Pass data to the view
                    include './views/author/edit_author.php';
                } else {
                    header("Location: index.php?controller=author&action=index&msg=not_found");
                }
            } else {
                header("Location: index.php?controller=author&action=index&msg=invalid_id");
            }
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
