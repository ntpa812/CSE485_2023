<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music for Life - Danh Sách Tác Giả</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
</head>
<body>
    <?php 
    include '../layout/header.php';
    include '../configs/db.php'; // Hoặc đường dẫn tương ứng với tệp db.php
    ?>
    <main class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm">
                <a href="index.php?controller=author&action=add" class="btn btn-success mb-3">Thêm mới</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên tác giả</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        if ($authors && $authors->num_rows > 0) {
                            while($row = $authors->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['ma_tgia'] . "</td>";
                                echo "<td>" . $row['ten_tgia'] . "</td>";
                                echo '<td><a href="index.php?controller=author&action=edit&ma_tgia=' . $row['ma_tgia'] . '"><i class="fa-solid fa-pen-to-square"></i></a></td>';
                                echo '<td><a href="index.php?controller=author&action=delete&ma_tgia=' . $row['ma_tgia'] . '" onclick="return confirm(\'Bạn có chắc chắn muốn xóa tác giả này?\')"><i class="fa-solid fa-trash"></i></a></td>';
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
    <?php include '../layout/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
