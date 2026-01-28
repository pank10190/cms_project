<?php
include('dbconfig.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM articles WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $article = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $article['title']; ?></title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <h1><?php echo $article['title']; ?></h1>
    <p><?php echo nl2br($article['content']); ?></p>
</body>
</html>
