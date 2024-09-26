<!-- views/articles/detail.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music for Life</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php include 'views/layout/header.php'; ?>

    <main class="container mt-5">
        <div class="row mb-5">
            <div class="col-sm-4">
                <?php
                // Kiểm tra đường dẫn hình ảnh
                $imagePath = 'assets/images/songs/' . $article['hinhanh'];
                if (!empty($article['hinhanh']) && file_exists($imagePath)) {
                    $imageFile = $article['hinhanh'];
                } else {
                    $imageFile = 'logo.png';
                }
                ?>
                <img src="assets/images/songs/<?php echo $imageFile; ?>" class="img-fluid" alt="<?php echo $article['ten_bhat']; ?>">
            </div>

            <div class="col-sm-8">
                <h5 class="card-title mb-2">
                    <a href="" class="text-decoration-none"><?php echo $article['tieude']; ?></a>
                </h5>
                <p class="card-text"><span class="fw-bold">Bài hát: </span><?php echo $article['ten_bhat']; ?></p>
                <p class="card-text"><span class="fw-bold">Thể loại: </span><?php echo $article['ten_tloai']; ?></p>
                <p class="card-text"><span class="fw-bold">Tóm tắt: </span><?php echo $article['tomtat']; ?></p>
                <p class="card-text"><span class="fw-bold">Nội dung: </span><?php echo $article['noidung']; ?></p>
                <p class="card-text"><span class="fw-bold">Tác giả: </span><?php echo $article['ten_tgia']; ?></p>
            </div>
        </div>
    </main>

    <?php include 'views/layout/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
