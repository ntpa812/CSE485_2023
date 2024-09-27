<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music for Life</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- <link rel="stylesheet" href="assets/css/style_login.css"> -->
    <link rel="stylesheet" href="assets/css/style_upd.css">
</head>
<body>
    <?php include 'views/layout/header.php'; ?>
    <?php include 'views/home/slideshow.php'; ?>

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
            

<?php include 'top_songs.php';?>


    <?php include 'views/layout/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
