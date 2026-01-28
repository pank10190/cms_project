<?php
include('../dbconfig.php');

if (isset($_POST['id'], $_POST['article_name'], $_POST['article_content'])) {
    $articleId = $_POST['id'];
    $articleName = $_POST['article_name'];
    $articleContent = $_POST['article_content'];
    
    // Check if an image file was uploaded
    $articleImage = null;
    if (isset($_FILES['article_image']) && $_FILES['article_image']['error'] === UPLOAD_ERR_OK) {
        $articleImage = 'uploads/' . basename($_FILES['article_image']['name']);
        move_uploaded_file($_FILES['article_image']['tmp_name'], $articleImage);
    }

    // Update article details in the database
    $sql = "UPDATE article SET name = ?, content = ?, image = ? WHERE id = ?";
    $stmt = $conn_douwantm->prepare($sql);
    $stmt->bind_param("sssi", $articleName, $articleContent, $articleImage, $articleId);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to update article']);
    }

    $stmt->close();
}
?>
