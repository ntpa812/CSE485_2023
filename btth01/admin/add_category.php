<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm mới thể loại</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include 'header.php'; ?>
    <?php
        include '../db.php'; // Kết nối cơ sở dữ liệu
    
        // Kiểm tra nếu form được gửi và có tên thể loại
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['category_name'])) {
            $category_name = trim($_POST['category_name']); // Xử lý tên thể loại
        
            if (!empty($category_name)) {
                // Truy vấn lấy mã thể loại lớn nhất hiện tại
                $sql_max_id = "SELECT MAX(ma_tloai) AS max_id FROM theloai";
                $result = mysqli_query($conn, $sql_max_id);
                $row = mysqli_fetch_assoc($result);
                $max_id = $row['max_id'];
            
                // Nếu cơ sở dữ liệu trống thì gán mã thể loại là 1, nếu không thì tăng mã thể loại lên 1
                $new_category_id = ($max_id !== null) ? $max_id + 1 : 1;
            
                // Chuẩn bị câu lệnh SQL để thêm thể loại mới với mã lớn nhất + 1
                $sql = "INSERT INTO theloai (ma_tloai, ten_tloai) VALUES (?, ?)";
            
                // Sử dụng prepared statements để tránh SQL injection
                if ($stmt = $conn->prepare($sql)) {
                    $stmt->bind_param("is", $new_category_id, $category_name); // Gán giá trị mã và tên thể loại
                
                    // Thực thi câu lệnh SQL
                    if ($stmt->execute()) {
                        // Chuyển hướng về trang danh sách thể loại với thông báo thành công
                        header("Location: category.php?msg=success");
                        exit();
                    } else {
                        // Hiển thị lỗi nếu có
                        echo "Error: " . $stmt->error;
                    }
                } else {
                    echo "Error preparing statement: " . $conn->error;
                }
            } else {
                // Xử lý khi tên thể loại rỗng
                header("Location: add_category.php?msg=empty");
                exit();
            }
        }
    
        // Đóng kết nối cơ sở dữ liệu
        mysqli_close($conn);
    ?>
    
    <main class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold">Thêm mới thể loại</h3>
                
                <!-- Check for error messages -->
                <?php
                    if (isset($_GET['msg']) && $_GET['msg'] == 'empty') {
                        echo '<div class="alert alert-danger">Vui lòng nhập tên thể loại.</div>';
                    } elseif (isset($_GET['msg']) && $_GET['msg'] == 'success') {
                        echo '<div class="alert alert-success">Thêm thể loại thành công!</div>';
                    }
                ?>
                
                <!-- Form to add a new category -->
                <form action="add_category.php" method="post">
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Tên thể loại</span>
                        <input type="text" class="form-control" name="category_name" placeholder="Nhập tên thể loại" required>
                    </div>
                    <div class="form-group float-end">
                        <input type="submit" value="Thêm" class="btn btn-success">
                        <a href="category.php" class="btn btn-warning">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <?php include '../footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
