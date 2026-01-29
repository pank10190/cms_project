<?php
include('dbconfig.php');
include('header.php');

$sql = "SELECT id, name, image, content, created_at FROM article ORDER BY id DESC";
$result = $conn_douwantm->query($sql);
?>

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">📄 Articles</h5>
        </div>

        <div class="card-body">
            <table class="table table-bordered table-hover text-center">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Article Name</th>
                        <th>Article Content</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                if ($result->num_rows > 0) {
                    $i = 1;
                    while ($row = $result->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td class="text-start"><?= htmlspecialchars($row['name']); ?></td>
                        <td class="text-start"><?= htmlspecialchars($row['content']); ?></td>
                        <td>
                            <a href="view_article.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-info">View</a>
                        </td>
                    </tr>
                <?php
                    }
                } else {
                ?>
                    <tr>
                        <td colspan="4">No articles found</td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>
