<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music for Life</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/style_upd.css">
</head>
<body>
    <?php include '../../views/layout/header.php'; ?>

    <?php
        // Kết nối tới cơ sở dữ liệu
        include '../../configs/db.php'; // Kết nối CSDL

        // Lấy ID bài viết từ URL
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;

        // Truy vấn thông tin chi tiết bài viết, bao gồm cả trường 'hinhanh'
        $query = "SELECT baiviet.tieude, baiviet.ten_bhat, baiviet.tomtat, baiviet.noidung, baiviet.hinhanh, theloai.ten_tloai, tacgia.ten_tgia
                  FROM baiviet
                  JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai
                  JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia
                  WHERE baiviet.ma_bviet = ?";

        // Chuẩn bị câu truy vấn
        if ($stmt = mysqli_prepare($db, $query)) {
            mysqli_stmt_bind_param($stmt, 'i', $id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $article = mysqli_fetch_assoc($result);

            if (!$article) {
                echo "Bài viết không tồn tại!";
                exit;
            }

            mysqli_stmt_close($stmt);
        } else {
            echo "Error preparing the statement: " . mysqli_error($db);
            exit;
        }

        mysqli_close($db);
    ?>

    <main class="container mt-5">
        <div class="row mb-5">
            <div class="col-sm-4">
                <?php
                    $imagePath = '../../assets/images/songs/' . $article['hinhanh'];
                    if (!empty($article['hinhanh']) && file_exists($imagePath)) {
                        $imageFile = $article['hinhanh'];
                    } else {
                        $imageFile = 'default.jpg';
                    }
                ?>
                <img src="../../assets/images/songs/<?php echo htmlspecialchars($imageFile); ?>" class="img-fluid" alt="<?php echo htmlspecialchars($article['ten_bhat']); ?>">
            </div>

            <div class="col-sm-8">
                <h5 class="card-title mb-2">
                    <a href="" class="text-decoration-none"><?php echo htmlspecialchars($article['tieude']); ?></a>
                </h5>
                <p class="card-text"><span class="fw-bold">Bài hát: </span><?php echo htmlspecialchars($article['ten_bhat']); ?></p>
                <p class="card-text"><span class="fw-bold">Thể loại: </span><?php echo htmlspecialchars($article['ten_tloai']); ?></p>
                <p class="card-text"><span class="fw-bold">Tóm tắt: </span><?php echo htmlspecialchars($article['tomtat']); ?></p>
                <p class="card-text"><span class="fw-bold">Nội dung: </span><?php echo nl2br(htmlspecialchars($article['noidung'])); ?></p>
                <p class="card-text"><span class="fw-bold">Tác giả: </span><?php echo htmlspecialchars($article['ten_tgia']); ?></p>
            </div>
        </div>
    </main>

    <?php include '../../views/layout/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
