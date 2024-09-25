<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tieude = $_POST['tieude'];
    $ten_bhat = $_POST['ten_bhat'];
    $ma_tloai = $_POST['ma_tloai'];
    $tomtat = $_POST['tomtat'];
    $noidung = $_POST['noidung'];
    $ngayviet = date('Y-m-d H:i:s');
    $hinhanh = $_FILES['hinhanh']['name'];
    $target = "uploads/" . basename($hinhanh);

    // Thực hiện chèn dữ liệu vào CSDL
    $query = "INSERT INTO baiviet (tieude, ten_bhat, ma_tloai, tomtat, noidung, ngayviet, hinhanh)
              VALUES ('$tieude', '$ten_bhat', '$ma_tloai', '$tomtat', '$noidung', '$ngayviet', '$hinhanh')";
    mysqli_query($conn, $query);

    // Di chuyển hình ảnh vào thư mục uploads
    if (move_uploaded_file($_FILES['hinhanh']['tmp_name'], $target)) {
        echo "Thêm bài viết thành công!";
    } else {
        echo "Có lỗi xảy ra khi tải ảnh.";
    }
}
?>
