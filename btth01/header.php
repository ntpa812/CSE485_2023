<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style_upd.css">
    <title>Header Example</title>
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
                        <img src="images/logo2.png" alt="" class="img-fluid">
                    </a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse main-color" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>" aria-current="page" href="./">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'login.php' ? 'active' : ''; ?>" href="./login.php">Đăng nhập</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search" method="GET" action="search.php">
                        <input class="form-control me-2 main-color search-bar" type="search" name="query" placeholder="Nội dung cần tìm" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Tìm</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>
</body>
</html>
