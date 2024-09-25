<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music for Life - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="css/style_login.css">
</head>
<body>
    <?php 
    include '../layout/adminHeader.php';
    ?>
    <main class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm-3">
                <div class="card mb-2" style="width: 100%;">
                    <div class="card-body">
                        <h5 class="card-title text-center">
                            <a href="" class="text-decoration-none">Người dùng</a>
                        </h5>
                        <h5 class="h1 text-center">
                            <?php echo isset($counts['users']) ? $counts['users'] : 0; ?>  <!-- Kiểm tra và hiển thị số người dùng -->
                        </h5>
                    </div>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="card mb-2" style="width: 100%;">
                    <div class="card-body">
                        <h5 class="card-title text-center">
                            <a href="category.php" class="text-decoration-none">Thể loại</a>
                        </h5>
                        <h5 class="h1 text-center">
                            <?php echo isset($counts['categories']) ? $counts['categories'] : 0; ?> <!-- Kiểm tra và hiển thị số thể loại -->
                        </h5>
                    </div>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="card mb-2" style="width: 100%;">
                    <div class="card-body">
                        <h5 class="card-title text-center">
                            <a href="author.php" class="text-decoration-none">Tác giả</a>
                        </h5>
                        <h5 class="h1 text-center">
                            <?php echo isset($counts['authors']) ? $counts['authors'] : 0; ?> <!-- Kiểm tra và hiển thị số tác giả -->
                        </h5>
                    </div>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="card mb-2" style="width: 100%;">
                    <div class="card-body">
                        <h5 class="card-title text-center">
                            <a href="article.php" class="text-decoration-none">Bài viết</a>
                        </h5>
                        <h5 class="h1 text-center">
                            <?php echo isset($counts['articles']) ? $counts['articles'] : 0; ?> <!-- Kiểm tra và hiển thị số bài viết -->
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include '../layout/footer.php';?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
