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
    <?php include __DIR__.'/../layout/adminHeader.php'; ?>
    <main class="container mt-5 mb-5">
        <a href="http://localhost/btth02/index.php?controller=author&action=add" class="btn btn-success mb-3">Thêm mới</a>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tên tác giả</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
            <?php if ($authors && $authors->num_rows > 0): ?>
                <?php while ($row = $authors->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['ma_tgia']; ?></td>
                        <td><?= $row['ten_tgia']; ?></td>
                        <td><a href="http://localhost/btth02/index.php?controller=author&action=edit&ma_tgia=<?= $row['ma_tgia']; ?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
                        <td><a href="http://localhost/btth02/index.php?controller=author&action=delete&ma_tgia=<?= $row['ma_tgia']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa tác giả này?')"><i class="fa-solid fa-trash"></i></a></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="4">Không có tác giả nào.</td></tr>
            <?php endif; ?>
            </tbody>
        </table>
    </main>
    <?php include __DIR__.'/../layout/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
