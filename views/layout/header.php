<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music for Life</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/style_upd.css">
    <style>
        /* CSS cho lớp active */
        .nav-link.active {
            font-weight: bold; /* In đậm */
            color: #007bff; /* Màu cho nút đang hoạt động */
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg shadow p-3 header main-color">
            <div class="container-fluid main-color">
                <div class="my-logo">
                    <a class="navbar-brand" href="#">
                        <img src="assets/images/logo2.png" alt="" class="img-fluid">
                    </a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse main-color" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <!-- Kiểm tra nếu trang hiện tại là index.php -->
                            <a class="nav-link <?php echo basename($_SERVER['SCRIPT_NAME']) == '../../index.php' ? 'active' : ''; ?>" aria-current="page" href="./">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <!-- Kiểm tra nếu trang hiện tại là login.php -->
                            <a class="nav-link <?php echo basename($_SERVER['SCRIPT_NAME']) == '../../login.php' ? 'active' : ''; ?>" href="./login.php">Đăng nhập</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search" method="GET" action="search.php">
                        <input class="form-control me-2 main-color search-bar" type="search" name="query" placeholder="Nội dung cần tìm" aria-label="Search">
                        <button class="btn btn-outline-success btn-search" type="submit">Tìm</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>
</body>
</html>
