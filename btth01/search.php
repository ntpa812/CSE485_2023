<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả tìm kiếm: <?php echo htmlspecialchars($searchQuery); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style_upd.css">

</head>
<body>
    <?php include 'header.php'; ?>
    <?php
        // Connect to the database
        include 'db.php'; // Ensure this file connects to your database

        // Check if a search query exists
        $searchQuery = isset($_GET['query']) ? trim($_GET['query']) : '';

        if ($searchQuery) {
            // Sanitize the user input to prevent SQL injection
            $searchQuery = mysqli_real_escape_string($conn, $searchQuery);

            // Query to search for songs by name
            $query = "SELECT ma_bviet, ten_bhat, hinhanh FROM baiviet WHERE ten_bhat LIKE ?";
            $stmt = mysqli_prepare($conn, $query);
            $likeQuery = '%' . $searchQuery . '%';
            mysqli_stmt_bind_param($stmt, 's', $likeQuery);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
        } else {
            echo "Vui lòng nhập từ khóa tìm kiếm!";
            exit;
        }
    ?>
    <main class="container-fluid mt-3">
        <h3 class="text-center text-uppercase mb-3 search-title">Kết quả tìm kiếm: "<?php echo htmlspecialchars($searchQuery); ?>"</h3>
        <div class="row">
            <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <div class="col-sm-3">
                            <div class="card mb-2" style="width: 100%;">
                                <img src="images/songs/<?php echo $row['hinhanh']; ?>" alt="<?php echo $row['ten_bhat']; ?>" class="card-img-top">
                                <div class="card-body">
                                    <h5 class="card-title text-center">
                                        <a href="detail.php?id=<?php echo $row['ma_bviet']; ?>" class="text-decoration-none"><?php echo $row['ten_bhat']; ?></a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo "<p class='text-center'>Không tìm thấy bài hát nào phù hợp với từ khóa \"$searchQuery\".</p>";
                }
            ?>
        </div>
    </main>

    <?php include 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
