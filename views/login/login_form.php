<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music for Life</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/style_login.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/style_upd.css">
</head>

<!-- views/login/login_form.php -->
<?php
    include 'views/layout/header.php';

   session_start(); // Bắt đầu session để kiểm tra thông báo lỗi

    // Kiểm tra nếu có thông báo lỗi trong session và hiển thị nó
    if (isset($_SESSION['error_message'])) {
        echo '<div class="alert alert-danger text-center" role="alert">';
        echo $_SESSION['error_message'];
        echo '</div>';

        // Xóa thông báo lỗi sau khi hiển thị để tránh hiển thị lại khi tải lại trang
        unset($_SESSION['error_message']);
    }
?>

<main class="container mt-5 mb-5">
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
                <h3>Sign In</h3>
                <div class="d-flex justify-content-end social_icon">
                    <span><i class="fab fa-facebook-square"></i></span>
                    <span><i class="fab fa-google-plus-square"></i></span>
                    <span><i class="fab fa-twitter-square"></i></span>
                </div>
            </div>
            <div class="card-body">
                <form method="POST" action="index.php?controller=login&action=login">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="txtUser"><i class="fas fa-user"></i></span>
                        <input type="text" class="form-control" name="username" placeholder="username" required>
                    </div>
                    
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="txtPass"><i class="fas fa-key"></i></span>
                        <input type="password" class="form-control" name="password" placeholder="password" required>
                    </div>
                    
                    <div class="row align-items-center remember">
                        <input type="checkbox">Remember Me
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Login" class="btn float-end login_btn">
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-center ">
                    Don't have an account?<a href="#" class="text-warning-1 text-decoration-none">Sign Up</a>
                </div>
                <div class="d-flex justify-content-center">
                    <a href="#" class="text-warning-1 text-decoration-none">Forgot your password?</a>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
    include 'views/layout/footer.php';
?>
