<?php
      // Nhúng nội dung của header
      include 'views/layout/header.php';
      ?>

<?php
// views/home/index.php

// Kết nối tới cơ sở dữ liệu
include 'configs/db.php';  // Nhúng file db.php để khởi tạo $db

// Nhúng SongController
require_once 'controllers/SongController.php';

// Kiểm tra nếu $db đã được khởi tạo thành công
if (isset($db)) {
    // Khởi tạo đối tượng SongController và hiển thị top bài hát
    $songController = new SongController($db);
    $songController->showTopSongs();
} else {
    echo "Không thể kết nối tới cơ sở dữ liệu.";
}
?>

<?php
    // Nhúng nội dung của footer
    include 'views/layout/footer.php';
    ?>