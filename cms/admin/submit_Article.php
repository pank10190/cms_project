<?php
session_start();
include('../dbconfig.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the POST data
    $article_name = $_POST['article_name'];
    $article_content = $_POST['article_content'];
    
    // Check if the image was uploaded
    if (isset($_FILES['article_image']) && $_FILES['article_image']['error'] == 0) {
        $image = $_FILES['article_image']['name'];
        $image_temp = $_FILES['article_image']['tmp_name'];
        $image_path = "uploads/" . $image;

        // Move uploaded file to the desired location
        if (move_uploaded_file($image_temp, $image_path)) {
            // Insert data into the database
            $sql = "INSERT INTO `article` (name, content, image) 
                    VALUES ('$article_name', '$article_content', '$image_path')";

            if ($conn_douwantm->query($sql) === TRUE) {
                echo "<div class='alert alert-success'>Article added successfully!</div>";
            } else {
                echo "<div class='alert alert-danger'>Error: " . $conn_douwantm->error . "</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>Error uploading image. Please try again.</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>No image uploaded or image upload error.</div>";
    }
}
?>
