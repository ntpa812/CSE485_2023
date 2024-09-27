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
    <?php include './views/layout/adminHeader.php'; ?>

    <main class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm">
                <a href="http://localhost/btth02/index.php?controller=article&action=add" class="btn btn-success mb-3">Thêm mới</a>
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
                    <?php if (!empty($articles)): ?>
                    <?php foreach ($articles as $article): ?>
                        <tr>
                            <td><?php echo $article['ma_bviet']; ?></td>
                            <td><?php echo $article['tieude']; ?></td>
                            <td><?php echo $article['ten_bhat']; ?></td>
                            <td><?php echo $article['ten_tgia']; ?></td>
                            <td><?php echo $article['ten_tloai']; ?></td>
                            <td><?php echo substr($article['tomtat'], 0, 50) . '...'; ?></td>
                            <td><?php echo $article['ngayviet']; ?></td>
                            <td><a href="http://localhost/btth02/index.php?controller=article&action=edit&ma_bviet=<?= $article['ma_bviet']; ?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
                            <td><a href="http://localhost/btth02/index.php?controller=article&action=delete&ma_bviet=<?= $article['ma_bviet']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa bài viết này?')"><i class="fa-solid fa-trash"></i></a></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="9">Không có bài viết nào.</td>
                    </tr>
                <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <!-- Include footer -->
    <?php include './views/layout/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
