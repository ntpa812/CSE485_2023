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
            $ten_tgia = $_POST['ten_tgia'];
            $hinh_tgia = $_POST['hinh_tgia'];
        
            if ($ten_tgia != "") {
                // Câu lệnh SQL để thêm tác giả
                $sql = "INSERT INTO tacgia (ten_tgia, hinh_tgia) VALUES ('$ten_tgia', '$hinh_tgia')";

                if (mysqli_query($conn, $sql)) {
                    // Redirect to the author page after successful addition
                    header("Location: author.php?msg=success");
                    exit();  // Make sure to exit to prevent further script execution
                } else {
                    echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
                }
            } else {
                header("Location: add_author.php?msg=empty");  // Redirect with an error message if the name is empty
                exit();
            }
        }

        mysqli_close($conn);
    ?>
    <main class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold">Thêm mới tác giả</h3>
                
                <!-- Check for error messages -->
                <?php
                    if (isset($_GET['msg']) && $_GET['msg'] == 'empty') {
                        echo '<div class="alert alert-danger">Vui lòng nhập tên tác giả.</div>';
                    } elseif (isset($_GET['msg']) && $_GET['msg'] == 'success') {
                        echo '<div class="alert alert-success">Thêm tác giả thành công!</div>';
                    }
                ?>
                
                <!-- Form to add a new author -->
                <form action="add_author.php" method="post">
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Tên tác giả</span>
                        <input type="text" class="form-control" name="ten_tgia" placeholder="Nhập tên tác giả" required>
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Hình tác giả</span>
                        <input type="text" class="form-control" name="hinh_tgia" placeholder="Nhập hình tác giả">
                    </div>
                    <div class="form-group float-end">
                        <input type="submit" value="Thêm" class="btn btn-success">
                        <a href="author.php" class="btn btn-warning">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
<?php include '../footer.php'; ?>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-q8vbdOaYk1SC72MqHfYKzGO04V6Sk4QkNmdv+B38/IlK+PTF3/Sk" crossorigin="anonymous"></script>
</html>
