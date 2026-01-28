<?php
include('dbconfig.php');

$sql = "SELECT id, name, image,content, created_at FROM article ORDER BY id DESC";
$result = $conn_douwantm->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Articles List</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f6f9;
        }
        .card {
            border-radius: 12px;
        }
        .table th {
            background-color: #0d6efd;
            color: #fff;
            text-align: center;
        }
        .table td {
            vertical-align: middle;
        }
        .article-img {
            width: 60px;
            height: 40px;
            object-fit: cover;
            border-radius: 6px;
        }
    </style>
</head>
<body>

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
                    
                <?php if ($result->num_rows > 0) { 
                    $i = 1;
                    while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td class="text-start"><?= htmlspecialchars($row['name']); ?></td>
                           <td class="text-start"><?= htmlspecialchars($row['content']); ?></td>
                            <td>
                                <a href="view_article.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-info">View</a>
                               
                            </td>
                        </tr>
                <?php } } else { ?>
                    <tr>
                        <td colspan="5">No articles found</td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>
