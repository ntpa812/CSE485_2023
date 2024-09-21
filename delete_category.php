<?php
    include '../db.php'; // include your database connection

    // Check if category ID is provided via GET
    if (isset($_GET['id'])) {
        $category_id = $_GET['id'];

        // Delete query to remove the category
        $sql = "DELETE FROM theloai WHERE ma_tloai = $category_id";

        // Execute the delete query
        if (mysqli_query($conn, $sql)) {
            echo "Category deleted successfully.";
            header("Location: category.php"); // Redirect back to the category listing
            exit();
        } else {
            echo "Error deleting category: " . mysqli_error($conn);
        }
    } else {
        echo "No category ID provided.";
    }

    // Close the connection
    mysqli_close($conn);
?>
