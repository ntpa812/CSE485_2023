
    <?php 
        include 'views/layout/header.php';

        include 'views/home/slideshow.php';
        
        include 'configs/db.php';
        
        require_once 'controllers/SongController.php';

            // Kiểm tra nếu $db đã được khởi tạo thành công
            if (isset($db)) {
                // Khởi tạo đối tượng SongController và hiển thị top bài hát
                $songController = new SongController($db);
                $songController->showTopSongs();
            } else {
                echo "Không thể kết nối tới cơ sở dữ liệu.";
            }

        include 'views/layout/footer.php';

?>