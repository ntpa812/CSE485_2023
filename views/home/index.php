<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music for Life</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/style_upd.css">
</head>

<body>

<?php include '../../views/layout/header.php'; ?>

<?php include '../../views/home/slideshow.php'; ?>

<div>
<?php
    // views/home/index.php

        // Kết nối tới cơ sở dữ liệu
        include '../../configs/db.php';  // Nhúng file db.php để khởi tạo $db

        // Nhúng SongController
        require_once '../../controllers/SongController.php';

        // Kiểm tra nếu $db đã được khởi tạo thành công
        if (isset($db)) {
            // Khởi tạo đối tượng SongController và hiển thị top bài hát
            $songController = new SongController($db);
            $songController->showTopSongs();
        } else {
            echo "Không thể kết nối tới cơ sở dữ liệu.";
        }
    ?>
    
    </div>

    <?php include '../layout/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
</html>
