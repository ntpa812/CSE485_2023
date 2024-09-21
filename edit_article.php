<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music for Life</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style_login.css">
</head>
<body>
    <?php include 'header.php'; ?>
    
    <?php
        include '../db.php';  // Kết nối đến cơ sở dữ liệu

        // Kiểm tra nếu có tham số ma_bviet trong URL
        if (isset($_GET['ma_bviet'])) {
            $ma_bviet = $_GET['ma_bviet'];

            // Truy vấn lấy thông tin bài viết hiện tại
            $result = mysqli_query($conn, "SELECT * FROM baiviet WHERE ma_bviet = $ma_bviet");

            // Kiểm tra nếu truy vấn có kết quả
            if ($result && mysqli_num_rows($result) > 0) {
                $article = mysqli_fetch_assoc($result);
            } else {
                // Nếu không có bài viết nào tương ứng, điều hướng về trang danh sách với thông báo lỗi
                header("Location: article.php?msg=not_found");
                exit();
            }
        } else {
            // Nếu không có ma_bviet trong URL, điều hướng về trang danh sách với thông báo lỗi
            header("Location: article.php?msg=invalid_id");
            exit();
        }

        // Xử lý khi người dùng submit form
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $tieude = $_POST['tieude'];
            $ten_bhat = $_POST['ten_bhat'];
            $tomtat = $_POST['tomtat'];
            $noidung = $_POST['noidung'];

            // Kiểm tra nếu các trường không trống
            if ($tieude != "" && $ten_bhat != "" && $tomtat != "") {
                
                // Cập nhật thông tin bài viết trong cơ sở dữ liệu
                $updateQuery = "UPDATE baiviet SET tieude = '$tieude', ten_bhat = '$ten_bhat', tomtat = '$tomtat', noidung = '$noidung' WHERE ma_bviet = $ma_bviet";
                if (mysqli_query($conn, $updateQuery)) {
                    header("Location: article.php?msg=success");
                    exit();
                } else {
                    echo "Error updating article: " . mysqli_error($conn);
                }
            } else {
                echo '<div class="alert alert-danger">Vui lòng nhập đầy đủ thông tin.</div>';
            }
        }

        // Đóng kết nối
        mysqli_close($conn);
    ?>

    <main class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold">Chỉnh sửa bài viết</h3>
                <form action="edit_article.php?ma_bviet=<?php echo $article['ma_bviet']; ?>" method="post">
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Tiêu đề bài viết</span>
                        <input type="text" class="form-control" name="tieude" value="<?php echo $article['tieude']; ?>" required>
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Tên bài hát</span>
                        <input type="text" class="form-control" name="ten_bhat" value="<?php echo $article['ten_bhat']; ?>" required>
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Tóm tắt</span>
                        <textarea class="form-control" name="tomtat" rows="3" required><?php echo $article['tomtat']; ?></textarea>
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Nội dung</span>
                        <textarea class="form-control" name="noidung" rows="5"><?php echo $article['noidung']; ?></textarea>
                    </div>

                    <div class="form-group float-end">
                        <input type="submit" value="Lưu lại" class="btn btn-success">
                        <a href="article.php" class="btn btn-warning">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <?php include '../footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
