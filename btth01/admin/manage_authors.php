<?php
include('header.php');
// Kết nối đến cơ sở dữ liệu
$conn = mysqli_connect("localhost", "root", "", "BTTH01_CSE485");
$query = "SELECT * FROM tacgia";
$result = mysqli_query($conn, $query);
?>
<div class="container">
    <h2>Danh sách Tác giả</h2>
    <a href="add_author.php" class="btn btn-primary">Thêm Tác giả</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Mã Tác giả</th>
                <th>Tên Tác giả</th>
                <th>Hình ảnh</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= $row['ma_tgia']; ?></td>
                <td><?= $row['ten_tgia']; ?></td>
                <td><img src="images/<?= $row['hinh_tgia']; ?>" width="50"></td>
                <td>
                    <a href="edit_author.php?id=<?= $row['ma_tgia']; ?>" class="btn btn-warning">Sửa</a>
                    <a href="delete_author.php?id=<?= $row['ma_tgia']; ?>" class="btn btn-danger">Xóa</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php include('footer.php'); ?>
