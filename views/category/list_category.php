<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music for Life - Danh sách thể loại</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

</head>
<body>
    <?php include './views/layout/adminHeader.php'; ?>

    <div class="container">
        <h2>Danh sách thể loại</h2>
        <a href="index.php?controller=category&action=add" class="btn btn-success mb-3">Thêm mới</a>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tên thể loại</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($categories)): ?>
                    <?php foreach ($categories as $category): ?>
                        <tr>
                            <td><?php echo $category['ma_tloai']; ?></td>
                            <td><?php echo $category['ten_tloai']; ?></td>
                            <td><a href="index.php?controller=category&action=edit&ma_tloai=<?= $category['ma_tloai']; ?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
                            <td><a href="index.php?controller=category&action=delete&ma_tloai=<?= $category['ma_tloai']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa thể loại này?')"><i class="fa-solid fa-trash"></i></a></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4">Không có thể loại nào.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <?php include './views/layout/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
