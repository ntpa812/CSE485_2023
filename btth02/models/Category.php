<?php
require_once './configs/db.php'; // Kết nối cơ sở dữ liệu

class Category {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Lấy danh sách tất cả các thể loại
    public function getAllCategories() {
        $sql = "SELECT * FROM theloai ORDER BY ma_tloai ASC";
        $result = $this->conn->query($sql);

        $categories = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $categories[] = $row;
            }
        }
        return $categories;
    }

    // Thêm thể loại mới
    public function addCategory($category_name) {
        // Lấy mã thể loại lớn nhất hiện tại
        $sql_max_id = "SELECT MAX(ma_tloai) AS max_id FROM theloai";
        $result = $this->conn->query($sql_max_id);
        $row = $result->fetch_assoc();
        $new_category_id = ($row['max_id'] !== null) ? $row['max_id'] + 1 : 1;

        // Thêm thể loại mới
        $sql = "INSERT INTO theloai (ma_tloai, ten_tloai) VALUES (?, ?)";
        if ($stmt = $this->conn->prepare($sql)) {
            $stmt->bind_param("is", $new_category_id, $category_name);
            return $stmt->execute();
        } else {
            return false;
        }
    }

    // Sửa thể loại
    public function editCategory($category_id, $category_name) {
        $sql = "UPDATE theloai SET ten_tloai = ? WHERE ma_tloai = ?";
        if ($stmt = $this->conn->prepare($sql)) {
            $stmt->bind_param("si", $category_name, $category_id);
            return $stmt->execute();
        } else {
            return false;
        }
    }

    // Xóa thể loại
    public function deleteCategory($category_id) {
        $sql = "DELETE FROM theloai WHERE ma_tloai = ?";
        if ($stmt = $this->conn->prepare($sql)) {
            $stmt->bind_param("i", $category_id);
            return $stmt->execute();
        } else {
            return false;
        }
    }
}
?>
