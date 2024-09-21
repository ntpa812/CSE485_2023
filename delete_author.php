<?php
include '../db.php';  // Kết nối đến cơ sở dữ liệu

if (isset($_GET['ma_tgia'])) {
    $ma_tgia = $_GET['ma_tgia'];

    // Sử dụng prepared statement để xóa tác giả an toàn
    $stmt = $conn->prepare("DELETE FROM tacgia WHERE ma_tgia = ?");
    $stmt->bind_param("i", $ma_tgia);  // "i" indicates the parameter is an integer

    if ($stmt->execute()) {
        echo "Tác giả được xóa thành công.";
        header("Location: author.php");  // Điều hướng về trang danh sách sau khi xóa thành công
        exit();
    } else {
        echo "Lỗi: " . $stmt->error;
    }

    $stmt->close();  // Đóng prepared statement
}

mysqli_close($conn);  // Đóng kết nối
?>
