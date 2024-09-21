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

        // Kiểm tra nếu có tham số ma_tgia trong URL
        if (isset($_GET['ma_tgia'])) {
            $ma_tgia = $_GET['ma_tgia'];

            // Truy vấn lấy thông tin tác giả hiện tại
            $result = mysqli_query($conn, "SELECT * FROM tacgia WHERE ma_tgia = $ma_tgia");

            // Kiểm tra nếu truy vấn có kết quả
            if ($result && mysqli_num_rows($result) > 0) {
                $author = mysqli_fetch_assoc($result);
            } else {
                // Nếu không có tác giả nào tương ứng, điều hướng về trang danh sách với thông báo lỗi
                header("Location: author.php?msg=not_found");
                exit();
            }
        } else {
            // Nếu không có ma_tgia trong URL, điều hướng về trang danh sách với thông báo lỗi
            header("Location: author.php?msg=invalid_id");
            exit();
        }

        // Xử lý khi người dùng submit form
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten_tgia = $_POST['ten_tgia'];
            $hinh_tgia = $_POST['hinh_tgia'];

            // Cập nhật thông tin tác giả trong cơ sở dữ liệu
            $updateQuery = "UPDATE tacgia SET ten_tgia = '$ten_tgia', hinh_tgia = '$hinh_tgia' WHERE ma_tgia = $ma_tgia";
            if (mysqli_query($conn, $updateQuery)) {
                header("Location: author.php");
                exit();
            } else {
                echo "Error updating author: " . mysqli_error($conn);
            }
        }

        // Close the connection
        mysqli_close($conn);
    ?>
    <main class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold">Sửa thông tin tác giả</h3>
                <form action="edit_author.php?ma_tgia=<?php echo $author['ma_tgia']; ?>" method="post">
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblAuthorId">Mã tác giả</span>
                        <input type="text" class="form-control" name="ma_tgia" readonly value="<?php echo $author['ma_tgia']; ?>">
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblAuthorName">Tên tác giả</span>
                        <input type="text" class="form-control" name="ten_tgia" value="<?php echo $author['ten_tgia']; ?>">
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblAuthorImage">Hình tác giả</span>
                        <input type="text" class="form-control" name="hinh_tgia" value="<?php echo $author['hinh_tgia']; ?>">
                    </div>

                    <div class="form-group float-end">
                        <input type="submit" value="Lưu lại" class="btn btn-success">
                        <a href="author.php" class="btn btn-warning">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <?php include '../footer.php';?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
