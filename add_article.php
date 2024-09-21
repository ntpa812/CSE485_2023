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

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $tieude = $_POST['tieude'];
            $ten_bhat = $_POST['ten_bhat'];
            $tomtat = $_POST['tomtat'];
            $noidung = $_POST['noidung'];

            // Kiểm tra nếu các trường không trống (trừ noidung)
            if ($tieude != "" && $ten_bhat != "" && $tomtat != "") {
                
                // Truy vấn để lấy thông tin bài hát
                $song_query = "SELECT * FROM baiviet WHERE ten_bhat = '$ten_bhat'";
                $song_result = mysqli_query($conn, $song_query);

                // Kiểm tra nếu bài hát tồn tại
                if (mysqli_num_rows($song_result) > 0) {
                    $song = mysqli_fetch_assoc($song_result);
                    
                    // Lấy tác giả và thể loại từ bài hát
                    $ma_tgia = $song['ma_tgia'];
                    $ma_tloai = $song['ma_tloai'];
                    $ngayviet = date('Y-m-d');  // Ngày viết tự động là ngày hiện tại

                    // Câu lệnh SQL để thêm bài viết, cho phép nội dung có thể trống
                    $sql = "INSERT INTO baiviet (tieude, ten_bhat, ma_tgia, ma_tloai, tomtat, noidung, ngayviet) 
                            VALUES ('$tieude', '$ten_bhat', '$ma_tgia', '$ma_tloai', '$tomtat', '$noidung', '$ngayviet')";

                    if (mysqli_query($conn, $sql)) {
                        // Redirect to the article page after successful addition
                        header("Location: article.php?msg=success");
                        exit();  // Make sure to exit to prevent further script execution
                    } else {
                        echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
                    }

                } else {
                    // Nếu không có bài hát, hiển thị thông báo lỗi
                    header("Location: add_article.php?msg=song_not_found");
                    exit();
                }

            } else {
                header("Location: add_article.php?msg=empty");  // Redirect with an error message if required fields are empty
                exit();
            }
        }

        mysqli_close($conn);
    ?>
    <main class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold">Thêm mới bài viết</h3>
                
                <!-- Check for error messages -->
                <?php
                    if (isset($_GET['msg']) && $_GET['msg'] == 'empty') {
                        echo '<div class="alert alert-danger">Vui lòng nhập đầy đủ thông tin bài viết.</div>';
                    } elseif (isset($_GET['msg']) && $_GET['msg'] == 'success') {
                        echo '<div class="alert alert-success">Thêm bài viết thành công!</div>';
                    } elseif (isset($_GET['msg']) && $_GET['msg'] == 'song_not_found') {
                        echo '<div class="alert alert-danger">Bài hát không tồn tại.</div>';
                    }
                ?>
                
                <!-- Form to add a new article -->
                <form action="add_article.php" method="post">
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Tiêu đề bài viết</span>
                        <input type="text" class="form-control" name="tieude" placeholder="Nhập tiêu đề bài viết" required>
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Tên bài hát</span>
                        <input type="text" class="form-control" name="ten_bhat" placeholder="Nhập tên bài hát" required>
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Tóm tắt</span>
                        <textarea class="form-control" name="tomtat" rows="3" placeholder="Nhập tóm tắt bài viết" required></textarea>
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Nội dung</span>
                        <textarea class="form-control" name="noidung" rows="5" placeholder="Nhập nội dung bài viết (không bắt buộc)"></textarea>
                    </div>
                    <div class="form-group float-end">
                        <input type="submit" value="Thêm" class="btn btn-success">
                        <a href="article.php" class="btn btn-warning">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
<?php include '../footer.php'; ?>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-q8vbdOaYk1SC72MqHfYKzGO04V6Sk4QkNmdv+B38/IlK+PTF3/Sk" crossorigin="anonymous"></script>
</html>
