z<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Bài Viết</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include './views/layout/adminHeader.php'; ?>

    <main class="container mt-5">
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold">Thêm mới bài viết</h3>

                <!-- Hiển thị thông báo -->
                <?php if (isset($_GET['msg'])): ?>
                    <?php if ($_GET['msg'] == 'empty'): ?>
                        <div class="alert alert-danger">Vui lòng nhập đầy đủ thông tin.</div>
                    <?php elseif ($_GET['msg'] == 'success'): ?>
                        <div class="alert alert-success">Thêm bài viết thành công!</div>
                    <?php elseif ($_GET['msg'] == 'song_not_found'): ?>
                        <div class="alert alert-danger">Bài hát không tồn tại.</div>
                    <?php endif; ?>
                <?php endif; ?>

                <form action="index.php?controller=article&action=add" method="post">
                    <div class="mb-3">
                        <label for="tieude" class="form-label">Tiêu đề bài viết</label>
                        <input type="text" class="form-control" name="tieude" required>
                    </div>
                    <div class="mb-3">
                        <label for="ten_bhat" class="form-label">Tên bài hát</label>
                        <input type="text" class="form-control" name="ten_bhat" required>
                    </div>
                    <div class="mb-3">
                        <label for="tomtat" class="form-label">Tóm tắt</label>
                        <textarea class="form-control" name="tomtat" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="noidung" class="form-label">Nội dung</label>
                        <textarea class="form-control" name="noidung"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Thêm</button>
                    <a href="index.php?controller=article&action=index" class="btn btn-warning">Quay lại</a>
                </form>
            </div>
        </div>
    </main>

    <?php include './views/layout/footer.php'; ?>
</body>
</html>
