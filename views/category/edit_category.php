<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa thể loại</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include './views/layout/adminHeader.php'; ?>
    <main class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold">Sửa thông tin thể loại</h3>
                <form action="index.php?controller=category&action=edit" method="post">
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="ma_tloai">Mã thể loại</span>
                        <input type="text" class="form-control" name="ma_tloai" readonly value="<?php echo $category['ma_tloai']; ?>">
                    </div>
                    
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="ten_tloai">Tên thể loại</span>
                        <input type="text" class="form-control" name="ten_tloai" value="<?php echo $category['ten_tloai']; ?>">
                    </div>
                    
                    <div class="form-group float-end">
                        <input type="submit" value="Lưu lại" class="btn btn-success">
                        <a href="index.php?controller=category&action=index" class="btn btn-warning">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <?php include './views/layout/footer.php'; ?>
</body>
</html>
