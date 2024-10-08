<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/style_upd.css">
    <?php $current_page = isset($_GET['controller']) ? $_GET['controller'] : 'home'; ?>

    <style>
        .nav-link.active {
            font-weight: bold; 
            color: #007bff;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg shadow p-3 header main-color">
            <div class="container-fluid main-color">
                <div class="my-logo">
                    <a class="navbar-brand" href="#">
                        <img src="assets/images/logo2.png" alt="logo" class="img-fluid">
                    </a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse main-color" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link <?php echo $current_page == 'home' ? 'active' : ''; ?>" aria-current="page" href="index.php?controller=home&action=index">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo $current_page == 'login' ? 'active' : ''; ?>" href="index.php?controller=login&action=showLoginForm">Đăng nhập</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search" method="GET" action="index.php">
                        <input class="form-control me-2 main-color search-bar" type="search" name="query" placeholder="Nội dung cần tìm" aria-label="Search">
                        <input type="hidden" name="action" value="search"> <!-- Thêm tham số action -->
                        <button class="btn btn-outline-success btn-search" type="submit">Tìm</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>
</body>
</html>
