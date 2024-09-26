<!DOCTYPE html>

    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/style_upd.css">

<main class="container-fluid nav-top-song">
    <h3 class="text-center text-uppercase mb-3 main-color nav-top-song">TOP bài hát yêu thích</h3>
        <div class="row main-color p-3">
            <?php if (!empty($songs)): ?>
                <?php foreach ($songs as $song): ?>
                    <div class="col-sm-3">
                        <div class="card mb-2" style="width: 100%;">
                            <img src="assets/images/songs/<?= $song['hinhanh'] ?>" class="card-img-top" alt="<?= $song['ten_bhat'] ?>">
                            <div class="card-body">
                                <h5 class="card-title text-center">
                                    <a href="detail.php?id=<?= $song['ma_bviet'] ?>" class="text-decoration-none"><?= $song['ten_bhat'] ?></a>
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
    </html>