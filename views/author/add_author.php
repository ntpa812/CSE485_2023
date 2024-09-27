<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm mới tác giả</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>
    <?php include './views/layout/adminHeader.php'; ?>

    <main class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold">Thêm mới tác giả</h3>

                <?php if (isset($_GET['msg']) && $_GET['msg'] == 'empty'): ?>
                    <div class="alert alert-danger">Vui lòng nhập tên tác giả.</div>
                <?php elseif (isset($_GET['msg']) && $_GET['msg'] == 'success'): ?>
                    <div class="alert alert-success">Thêm tác giả thành công!</div>
                <?php endif; ?>

                <form action="http://localhost/btth02/index.php?controller=author&action=add" method="post">
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
                        <a href="http://localhost/btth02/index.php?controller=author&action=index" class="btn btn-warning">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <?php include './views/layout/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
