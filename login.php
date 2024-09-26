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

<body>
        <?php
        include 'configs/db.php'; // Kết nối đến cơ sở dữ liệu

        // Mã hóa mật khẩu cho từng người dùng
        $users = [
            ['id' => 1, 'password' => 'congngheweb'],
            ['id' => 2, 'password' => 'thayhieudeptrai'],
            ['id' => 3, 'password' => 'huhuhu'],
            ['id' => 4, 'password' => 'nguyenminhhieu'],
            ['id' => 5, 'password' => 'nguyenthiphuonganh']
        ];

        foreach ($users as $user) {
            $hashedPassword = password_hash($user['password'], PASSWORD_DEFAULT);
            $sql = "UPDATE Users SET password = ? WHERE user_id = ?";
            $stmt = $db->prepare($sql);
            $stmt->bind_param('si', $hashedPassword, $user['id']);
            $stmt->execute();
        }

        //echo "Cập nhật mật khẩu thành công!";
        ?>

    <?php
    session_start(); // Bắt đầu phiên
    include 'configs/db.php'; // Kết nối CSDL

    // Kiểm tra kết nối cơ sở dữ liệu
    if ($db->connect_error) {
        die("Kết nối CSDL thất bại: " . $conn->connect_error);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        // Truy vấn để tìm user theo username
        $sql = "SELECT * FROM Users WHERE username = ?";
        $stmt = $conn->prepare($sql);
        
        if ($stmt === false) {
            die('Lỗi chuẩn bị truy vấn SQL: ' . htmlspecialchars($conn->error));
        }

        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            
            // In ra mật khẩu mã hóa trong cơ sở dữ liệu (gỡ lỗi)
            //echo "Mật khẩu mã hóa trong cơ sở dữ liệu: " . $user['password'] . "<br>";
            
            // Kiểm tra mật khẩu đã mã hóa
            if (password_verify($password, $user['password'])) {
                // Đăng nhập thành công
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];

                // Chuyển hướng dựa trên vai trò
                if ($user['role'] === 'admin') {
                    header("Location: admin/index.php"); // Chuyển hướng đến trang admin
                } else {
                    header("Location: index.php"); // Chuyển hướng đến trang chủ
                }
                exit();
            } else {
                // Gỡ lỗi cho trường hợp mật khẩu không khớp
                //echo "Mật khẩu không chính xác. Mật khẩu nhập: $password<br>";
                echo "<script>alert('Sai mật khẩu!');</script>";
            }
        } else {
            echo "<script>alert('Không tìm thấy người dùng!');</script>";
        }

        $stmt->close();
    }

    $db->close();
    ?>



    <?php
        // Nhúng nội dung của header
        include 'views/layout/header.php';
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
                    <form method="POST" action="login.php">
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
        // Nhúng nội dung của footer
        include 'views/layout/footer.php';
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
