<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/style_upd.css">
</head>
<body>
<main class="container-fluid nav-top-song">
    <h3 class="text-center text-uppercase mb-3 main-color nav-top-song">TOP bài hát yêu thích</h3>
    <div class="row main-color p-3">
        <?php if (!empty($songs)): ?>
            <?php foreach ($songs as $song): ?>
                <div class="col-sm-3">
                    <div class="card mb-2" style="width: 100%;">
                        <!-- Đường dẫn hình ảnh nên được điều chỉnh để đúng với cấu trúc thư mục -->
                        <img src="../../assets/images/songs/<?= htmlspecialchars($song['hinhanh']) ?>" class="card-img-top" alt="<?= htmlspecialchars($song['ten_bhat']) ?>">
                        <div class="card-body">
                            <h5 class="card-title text-center">
                                <!-- Điều chỉnh đường dẫn chi tiết bài viết -->
                                <a href="../../index.php?controller=song&action=detail&id=<?= htmlspecialchars($song['ma_bviet']) ?>" class="text-decoration-none"><?= htmlspecialchars($song['ten_bhat']) ?></a>
                            </h5>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-center">Không có bài hát nào để hiển thị.</p>
        <?php endif; ?>
    </div>
</main>
</body>
</html>
