<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music for Life - Danh Sách Tác Giả</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style_login.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <main class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm">
                <a href="add_author.php" class="btn btn-success mb-3">Thêm mới</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên tác giả</th>
                            <!-- Nếu bạn muốn hiển thị hình ảnh, bỏ comment dòng dưới -->
                            <!-- <th scope="col">Hình ảnh</th> -->
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include '../db.php'; // Kết nối CSDL

                            // Truy vấn lấy danh sách tác giả
                            $sql = "SELECT ma_tgia, ten_tgia, hinh_tgia FROM tacgia";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // Hiển thị danh sách tác giả
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row['ma_tgia'] . "</td>";
                                    echo "<td>" . $row['ten_tgia'] . "</td>";
                                    // Nếu bạn muốn hiển thị hình ảnh, bỏ comment dòng dưới
                                    // echo "<td><img src='" . $row['hinh_tgia'] . "' alt='" . $row['ten_tgia'] . "' style='width: 50px; height: 50px; object-fit: cover;'></td>";
                                    echo '<td><a href="edit_author.php?ma_tgia=' . $row['ma_tgia'] . '"><i class="fa-solid fa-pen-to-square"></i></a></td>';
                                    echo '<td><a href="delete_author.php?ma_tgia=' . $row['ma_tgia'] . '" onclick="return confirm(\'Bạn có chắc chắn muốn xóa tác giả này?\')"><i class="fa-solid fa-trash"></i></a></td>';
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='4'>Không có tác giả nào.</td></tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <?php include '../footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
