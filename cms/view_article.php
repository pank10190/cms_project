<?php
include('dbconfig.php');



$articleId = $_GET['id'];

$sql = "SELECT name, content, image, created_at FROM article WHERE id = ?";
$stmt = $conn_douwantm->prepare($sql);
$stmt->bind_param("i", $articleId);
$stmt->execute();
$result = $stmt->get_result();



$article = $result->fetch_assoc();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Article</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #eef2f7, #f8f9fb);
            font-family: "Segoe UI", sans-serif;
        }
        .card {
            border-radius: 16px;
            border: none;
        }
        .card-header {
            border-radius: 16px 16px 0 0;
        }
        .article-img {
            width: 100%;
            max-height: 380px;
            object-fit: cover;
            border-radius: 14px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }
        .article-title {
            font-weight: 700;
            letter-spacing: 0.3px;
        }
        .article-meta {
            font-size: 14px;
            color: #6c757d;
        }
        .article-content {
            font-size: 16px;
            line-height: 1.9;
            color: #333;
        }
        .btn {
            border-radius: 10px;
            padding: 8px 16px;
        }
    </style>
</head>
<body>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-9">

            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white d-flex align-items-center">
                    <i class="bi bi-journal-text fs-4 me-2"></i>
                    <h5 class="mb-0">View Article</h5>
                </div>

                <div class="card-body p-4">

                    <!-- Title -->
                    <h2 class="article-title mb-2">
                        <?= htmlspecialchars($article['name']); ?>
                    </h2>

                    <!-- Meta -->
                    <div class="article-meta mb-4">
                        <i class="bi bi-calendar-event me-1"></i>
                        Published on <?= date('d M Y', strtotime($article['created_at'])); ?>
                    </div>

                    <!-- Image -->
                    <?php if (!empty($article['image'])) { ?>
                        <div class="mb-4">
                            <img src="../cms/admin/<?= $article['image']; ?>" class="article-img">
                        </div>
                    <?php } ?>

                    <!-- Content -->
                    <div class="article-content">
                        <?= nl2br(htmlspecialchars($article['content'])); ?>
                    </div>

                    <!-- Actions -->
                    <div class="d-flex justify-content-between align-items-center mt-5">
                        <a href="index.php" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left"></i> Back
                        </a>

                       
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>
