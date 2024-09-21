<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm mới thể loại</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include 'header.php'; ?>
    <?php
        include '../db.php'; // Include your database connection

        // Check if the form submission is valid (POST request and category_name is set)
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['category_name'])) {
            $category_name = trim($_POST['category_name']); // Trim the input to avoid leading/trailing spaces

            if (!empty($category_name)) {
                // Prepare SQL statement to insert the new category into the 'theloai' table
                $sql = "INSERT INTO theloai (ten_tloai) VALUES (?)";
            
                // Use prepared statements to avoid SQL injection
                if ($stmt = $conn->prepare($sql)) {
                    $stmt->bind_param("s", $category_name);
                
                    // Execute the prepared statement
                    if ($stmt->execute()) {
                        // Redirect to the category list page with a success message
                        header("Location: category.php?msg=success");
                        exit();
                    } else {
                        // If there is an error, display it
                        echo "Error: " . $stmt->error;
                    }
                } else {
                    echo "Error preparing statement: " . $conn->error;
                }
            } else {
                // Handle case when category name is empty
                header("Location: add_category.php?msg=empty");
                exit();
            }
        }

        // Close the database connection
        $conn->close();
    ?>
    <main class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold">Thêm mới thể loại</h3>
                
                <!-- Check for error messages -->
                <?php
                    if (isset($_GET['msg']) && $_GET['msg'] == 'empty') {
                        echo '<div class="alert alert-danger">Vui lòng nhập tên thể loại.</div>';
                    } elseif (isset($_GET['msg']) && $_GET['msg'] == 'success') {
                        echo '<div class="alert alert-success">Thêm thể loại thành công!</div>';
                    }
                ?>
                
                <!-- Form to add a new category -->
                <form action="add_category.php" method="post">
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Tên thể loại</span>
                        <input type="text" class="form-control" name="category_name" placeholder="Nhập tên thể loại" required>
                    </div>
                    <div class="form-group float-end">
                        <input type="submit" value="Thêm" class="btn btn-success">
                        <a href="category.php" class="btn btn-warning">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <?php include '../footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
