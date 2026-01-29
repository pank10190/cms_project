<?php
include('dbconfig.php');
include('header.php');

$articleId = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$sql = "SELECT name, content, image, created_at FROM article WHERE id = ?";
$stmt = $conn_douwantm->prepare($sql);
$stmt->bind_param("i", $articleId);
$stmt->execute();
$result = $stmt->get_result();
$article = $result->fetch_assoc();
$stmt->close();
?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-9">

            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white d-flex align-items-center">
                    <i class="bi bi-journal-text fs-4 me-2"></i>
                    <h5 class="mb-0">View Article</h5>
                </div>

                <div class="card-body p-4">

                    <?php if ($article) { ?>

                        <!-- Title -->
                        <h2 class="fw-bold mb-2">
                            <?= htmlspecialchars($article['name']); ?>
                        </h2>

                        <!-- Meta -->
                        <div class="text-muted mb-4">
                            <i class="bi bi-calendar-event me-1"></i>
                            Published on <?= date('d M Y', strtotime($article['created_at'])); ?>
                        </div>

                        <!-- Image -->
                        <?php if (!empty($article['image'])) { ?>
                            <div class="mb-4">
                                <img src="../cms/admin/<?= htmlspecialchars($article['image']); ?>"
                                     class="img-fluid rounded shadow"
                                     style="max-height:250px; object-fit:cover; width:100%;">
                            </div>
                        <?php } ?>

                        <!-- Content -->
                        <div class="fs-6 lh-lg text-dark">
                            <?= nl2br(htmlspecialchars($article['content'])); ?>
                        </div>

                        <!-- Actions -->
                        <div class="d-flex justify-content-between align-items-center mt-5">
                            <a href="index.php" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-left"></i> Back
                            </a>
                        </div>

                    <?php } else { ?>

                        <div class="alert alert-warning text-center">
                            Article not found.
                        </div>

                        <div class="text-center">
                            <a href="index.php" class="btn btn-secondary">
                                Go Back
                            </a>
                        </div>

                    <?php } ?>

                </div>
            </div>

        </div>
    </div>
</div>

<?php include('footer.php'); ?>
