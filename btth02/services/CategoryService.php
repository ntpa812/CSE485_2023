<?php

class CategoryService {
    private $db;

    public function __construct() {
        // Kết nối cơ sở dữ liệu
        include './configs/db.php';
        $this->db = $db;
    }

    public function getAllCategories() {
        // Lấy tất cả thể loại từ cơ sở dữ liệu
        $sql = "SELECT ma_tloai, ten_tloai FROM theloai";
        $result = $this->db->query($sql);
        $categories = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $categories[] = $row;
            }
        }

        return $categories;
    }

    public function getCategoryById($id) {
        $sql = "SELECT ma_tloai, ten_tloai FROM theloai WHERE ma_tloai = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $category = $result->fetch_assoc();

        return $category;
    }

    public function addCategory($category_name) {
        // Lấy mã thể loại lớn nhất hiện tại
        $sql_max_id = "SELECT MAX(ma_tloai) AS max_id FROM theloai";
        $result = $this->db->query($sql_max_id);
        $row = $result->fetch_assoc();
        $new_category_id = ($row['max_id'] !== null) ? $row['max_id'] + 1 : 1;

        // Thêm thể loại mới
        $sql = "INSERT INTO theloai (ma_tloai, ten_tloai) VALUES (?, ?)";
        if ($stmt = $this->db->prepare($sql)) {
            $stmt->bind_param("is", $new_category_id, $category_name);
            return $stmt->execute();
        } else {
            return false;
        }
    }

    public function editCategory($category_id, $category_name) {
        $sql = "UPDATE theloai SET ten_tloai = ? WHERE ma_tloai = ?";
        if ($stmt = $this->db->prepare($sql)) {
            $stmt->bind_param("si", $category_name, $category_id);
            return $stmt->execute();
        } else {
            return false;
        }
    }
    public function deleteCategory($category_id) {
        $sql = "DELETE FROM theloai WHERE ma_tloai = ?";
        if ($stmt = $this->db->prepare($sql)) {
            $stmt->bind_param("i", $category_id);
            return $stmt->execute();
        } else {
            return false;
        }
    }
}
?>
