<?php
class AuthorService {
    private $authorModel;

    public function __construct() {
        $this->authorModel = new Author(); // Đảm bảo rằng model Author được khởi tạo đúng cách
    }

    public function getAllAuthors() {
        return $this->authorModel->getAllAuthors(); // Trả về kết quả của phương thức getAllAuthors trong Model
    }

    public function addAuthor($name, $image) {
        return $this->authorModel->addAuthor($name, $image);
    }

    public function deleteAuthor($id) {
        return $this->authorModel->deleteAuthor($id);
    }
}
?>
