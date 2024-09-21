<!DOCTYPE html>
<link rel="stylesheet" href="css/style_upd.css">

<header>
    <nav class="navbar navbar-expand-lg shadow p-3 bg-white main-color header">
        <div class="container-fluid">
            <div class="my-logo">
                <a class="navbar-brand" href="#">
                    <img src="images/logo2.png" alt="" class="img-fluid">
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="./">Trang chủ</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="./login.php">Đăng nhập</a>
                </li>
            </ul>
            <form class="d-flex" role="search" method="GET" action="search.php">
                <input class="form-control me-2" type="search" name="query" placeholder="Nội dung cần tìm" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Tìm</button>
            </form>
            </div>
        </div>
    </nav>
    </header>