<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/style_upd.css"> -->
</head>
<body>

    <!-- <main class="container-fluid nav-top-song">
        <h3 class="text-center text-uppercase mb-3 main-color nav-top-song">TOP bài hát yêu thích</h3>
        <div class="row main-color p-3">
        <?php if (!empty($songs)): ?>
                <?php foreach ($songs as $song): ?>
                    <div class="col-sm-3">
                    <div class="card mb-2" style="width: 100%;">
                        <img src="../../assets/images/songs/<?= htmlspecialchars($song['hinhanh']) ?>" class="card-img-top" alt="<?= htmlspecialchars($song['ten_bhat']) ?>">
                        <div class="card-body">
                            <h5 class="card-title text-center">
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
    </main> -->

    <main class="container-fluid nav-top-song">
            <h3 class="text-center text-uppercase mb-3 main-color nav-top-song">TOP bài hát yêu thích</h3>
            <div class="row main-color p-3">
                <div class="col-sm-3">
                    <div class="card mb-2" style="width: 100%;">
                        <img src="assets/images/songs/cayvagio.jpg" class="card-img-top" alt="cayvagio">
                        <div class="card-body">
                            <h5 class="card-title text-center">
                                <a href="detail.php?id=12" class="text-decoration-none">Cây, lá và gió</a>
                            </h5>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="card mb-2" style="width: 100%;">
                        <img src="assets/images/songs/csmt.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-center">
                                <a href="detail.php?id=11" class="text-decoration-none">Cuộc sống mến thương</a>
                            </h5>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="card mb-2" style="width: 100%;">
                        <img src="assets/images/songs/longme.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-center">
                                <a href="detail.php?id=1" class="text-decoration-none">Lòng mẹ</a>
                            </h5>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="card mb-2" style="width: 100%;">
                        <img src="assets/images/songs/phoipha.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-center">
                                <a href="detail.php?id=3" class="text-decoration-none">Phôi pha</a>
                            </h5>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="card mb-2" style="width: 100%;">
                        <img src="assets/images/songs/noitinhyeubatdau.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-center my-title">
                                <a href="detail.php?id=8" class="text-decoration-none">Nơi tình yêu bắt đầu</a>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>
