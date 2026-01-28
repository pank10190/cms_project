<?php
include('../dbconfig.php');

if (isset($_GET['id'])) {
    $articleId = $_GET['id'];
    
    $sql = "SELECT id, name, content, image FROM article WHERE id = ?";
    $stmt = $conn_douwantm->prepare($sql);
    $stmt->bind_param("i", $articleId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $article = $result->fetch_assoc();
        echo json_encode($article);  // Return the article data as JSON
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Article not found']);
    }

    $stmt->close();
}
?>
