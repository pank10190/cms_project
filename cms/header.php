<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Articles</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
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

        /* Navbar: keep same color for all links */
        .navbar .nav-link {
            color: #ffffff !important;
        }
        .navbar .nav-link:hover {
            color: #e2e6ea !important;
        }

        /* Mobile tweaks */
        @media (max-width: 576px) {
            .table th,
            .table td {
                font-size: 0.85rem;
                padding: 8px;
            }
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index.php">📰 My Articles</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <!-- <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="add_article.php">Add Article</a>
                </li> -->
            </ul>
        </div>
    </div>
</nav>
