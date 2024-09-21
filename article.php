<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music for Life - Danh sách bài viết</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!-- Include header -->
    <?php include 'header.php'; ?>

    <main class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm">
                <a href="add_article.php" class="btn btn-success mb-3">Thêm mới</a>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tiêu đề</th>
                            <th scope="col">Tên bài hát</th>
                            <th scope="col">Tác giả</th>
                            <th scope="col">Thể loại</th>
                            <th scope="col">Tóm tắt</th>
                            <th scope="col">Ngày viết</th>
                            <th scope="col">Sửa</th>
                            <th scope="col">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include '../db.php'; // Kết nối database

                            // Lấy danh sách các bài viết với thông tin thêm
                            $sql = "SELECT baiviet.ma_bviet, baiviet.tieude, baiviet.tomtat, baiviet.ngayviet, 
                                           baiviet.ten_bhat, tacgia.ten_tgia, theloai.ten_tloai 
                                    FROM baiviet 
                                    JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia
                                    JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai
                                    ORDER BY baiviet.ma_bviet ASC"; // ASC để sắp xếp tăng dần theo mã bài viết
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // Hiển thị dữ liệu
                                while($row = $result->fetch_assoc()) {
                                    // Tóm tắt giới hạn 50 ký tự
                                    $tomtat = substr($row['tomtat'], 0, 50) . '...';

                                    echo "<tr>";
                                    echo "<td>" . $row['ma_bviet'] . "</td>";
                                    echo "<td>" . $row['tieude'] . "</td>";
                                    echo "<td>" . $row['ten_bhat'] . "</td>";
                                    echo "<td>" . $row['ten_tgia'] . "</td>";
                                    echo "<td>" . $row['ten_tloai'] . "</td>";
                                    echo "<td>" . $tomtat . "</td>";
                                    echo "<td>" . $row['ngayviet'] . "</td>";
                                    echo '<td><a href="edit_article.php?ma_bviet=' . $row['ma_bviet'] . '"><i class="fa-solid fa-pen-to-square"></i></a></td>';
                                    echo '<td><a href="delete_article.php?ma_bviet=' . $row['ma_bviet'] . '" onclick="return confirm(\'Bạn có chắc chắn muốn xóa bài viết này?\')"><i class="fa-solid fa-trash"></i></a></td>';
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='9'>Không có bài viết nào.</td></tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <!-- Include footer -->
    <?php include '../footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
