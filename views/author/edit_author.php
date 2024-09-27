<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music for Life</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <?php include './views/layout/adminHeader.php'; ?>
    <main class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold">Sửa thông tin tác giả</h3>
                <form action="http://localhost/btth02/index.php?controller=author&action=edit" method="post"> <!-- Đường dẫn tương đối -->
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="ma_tgia">Mã tác giả</span>
                        <input type="text" class="form-control" name="ma_tgia" readonly value="<?php echo $author['ma_tgia']; ?>"> <!-- Đảm bảo an toàn đầu ra -->
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="ten_tgia">Tên tác giả</span>
                        <input type="text" class="form-control" name="ten_tgia" value="<?php echo $author['ten_tgia']; ?>">
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="hinh_tgia">Hình tác giả</span>
                        <input type="text" class="form-control" name="hinh_tgia" value="<?php echo $author['hinh_tgia']; ?>">
                    </div>

                    <div class="form-group float-end">
                        <input type="submit" value="Lưu lại" class="btn btn-success">
                        <a href="http://localhost/btth02/index.php?controller=author&action=index" class="btn btn-warning">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <?php include './views/layout/footer.php';?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>