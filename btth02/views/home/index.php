<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music for Life</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/style_upd.css">
</head>
<body>
    <?php include './views/layout/header.php'; ?>

    <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./assets/images/slideshow/slide01.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="./assets/images/slideshow/slide02.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="./assets/images/slideshow/slide03.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
    </div>

    <main class="container-fluid nav-top-song">
        <h3 class="text-center text-uppercase mb-3 main-color">TOP bài hát yêu thích</h3>
        <div class="row main-color p-3">
            <?php if (!empty($topSongs)): ?>
                <?php foreach ($topSongs as $song): ?>
                    <div class="col-sm-3">
                        <div class="card mb-2" style="width: 100%;">
                            <!-- Kiểm tra xem hình ảnh và tiêu đề có tồn tại không -->
                            <img src="<?php echo isset($song['image']) ? $song['image'] : 'default.jpg'; ?>" class="card-img-top" alt="<?php echo isset($song['title']) ? $song['title'] : 'No title'; ?>">
                            <div class="card-body">
                                <h5 class="card-title text-center">
                                    <a href="detail.php?id=<?php echo isset($song['id']) ? $song['id'] : '#'; ?>" class="text-decoration-none">
                                        <?php echo isset($song['title']) ? $song['title'] : 'No title'; ?>
                                    </a>
                                </h5>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No songs available.</p>
            <?php endif; ?>
        </div>
    </main>

    <?php include './views/layout/footer.php'; ?>
</body>
</html>
