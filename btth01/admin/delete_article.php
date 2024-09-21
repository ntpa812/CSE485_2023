<?php
include '../db.php';  // Kết nối đến cơ sở dữ liệu

if (isset($_GET['ma_bviet'])) {
    $ma_bviet = $_GET['ma_bviet'];

    // Bắt đầu transaction để đảm bảo tính toàn vẹn dữ liệu
    $conn->begin_transaction();

    try {
        // Trước tiên, lấy thông tin hình ảnh để có thể xóa tệp trên server
        $stmt_select = $conn->prepare("SELECT hinhanh FROM baiviet WHERE ma_bviet = ?");
        $stmt_select->bind_param("i", $ma_bviet);
        $stmt_select->execute();
        $result = $stmt_select->get_result();

        if ($result->num_rows === 0) {
            throw new Exception("Không tìm thấy bài viết với mã: $ma_bviet");
        }

        $row = $result->fetch_assoc();
        $hinhanh = $row['hinhanh'];

        $stmt_select->close();

        // Xóa bài viết khỏi bảng `baiviet`
        $stmt_delete = $conn->prepare("DELETE FROM baiviet WHERE ma_bviet = ?");
        $stmt_delete->bind_param("i", $ma_bviet);

        if (!$stmt_delete->execute()) {
            throw new Exception("Lỗi khi xóa bài viết: " . $stmt_delete->error);
        }

        $stmt_delete->close();

        // Nếu có hình ảnh, xóa tệp hình ảnh khỏi server
        if (!empty($hinhanh)) {
            $file_path = '../uploads/' . $hinhanh;  // Giả sử hình ảnh được lưu trong thư mục 'uploads'

            if (file_exists($file_path)) {
                if (!unlink($file_path)) {
                    throw new Exception("Xóa tệp hình ảnh thất bại: $file_path");
                }
            }
        }

        // Commit transaction nếu mọi thứ đều thành công
        $conn->commit();

        // Thông báo thành công và điều hướng
        echo "Bài viết đã được xóa thành công.";
        header("Location: article.php");  // Điều hướng về trang danh sách bài viết
        exit();
    } catch (Exception $e) {
        // Rollback transaction nếu có lỗi xảy ra
        $conn->rollback();
        echo "Đã xảy ra lỗi: " . $e->getMessage();
    }

    // Đóng kết nối prepared statement nếu còn mở
    if (isset($stmt_select) && $stmt_select) {
        $stmt_select->close();
    }
    if (isset($stmt_delete) && $stmt_delete) {
        $stmt_delete->close();
    }
}

mysqli_close($conn);  // Đóng kết nối
?>
