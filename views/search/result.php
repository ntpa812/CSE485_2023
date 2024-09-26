<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả tìm kiếm: <?php echo htmlspecialchars($query); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style_upd.css">
</head>
<body>
    <?php include 'views/layout/header.php'; ?>

    <main class="container-fluid mt-3">
        <h3 class="text-center text-uppercase mb-3 search-title">Kết quả tìm kiếm: "<?php echo htmlspecialchars($query); ?>"</h3>
        <div class="row nav-result">
            <?php if (!empty($songs)) { ?>
                <?php foreach ($songs as $song) { ?>
                    <div class="col-sm-3">
                        <div class="card mb-2" style="width: 100%;">
                            <img src="assets/images/songs/<?php echo htmlspecialchars($song['hinhanh']); ?>" alt="<?php echo htmlspecialchars($song['ten_bhat']); ?>" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title text-center">
                                    <a href="views/details/detail.php?id=<?php echo $song['ma_bviet']; ?>" class="text-decoration-none"><?php echo htmlspecialchars($song['ten_bhat']); ?></a>
                                </h5>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <p class="text-center">Không tìm thấy bài hát nào phù hợp với từ khóa "<?php echo htmlspecialchars($query); ?>".</p>
            <?php } ?>
        </div>
    </main>

    <?php include 'views/layout/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
