<?php
include 'head.php';
include 'sidebar.php';
include 'header.php';

?>
<main class="content">
	<div class="container-fluid p-0">

		<!-- Page Header -->
		<div class="mb-4 d-flex justify-content-between align-items-center">
			<div>
				<h1 class="h3 fw-bold text-dark">
					Article <span class="text-primary">List</span>
				</h1>
				<p class="text-muted mb-0">View and manage all Article events</p>
			</div>

			<!-- Optional Add Button -->
			<!-- Uncomment to add a button for adding new articles -->
			<!-- <a href="add_Article.php" class="btn btn-primary rounded-pill shadow">
                <i class="bi bi-plus-circle me-2"></i>Add Article
            </a> -->
		</div>

		<div class="row">
			<div class="col-12">
				<div class="card border-0 shadow-lg rounded-4">

					<!-- Card Header -->
					<div class="card-header bg-light border-0 rounded-top-4 py-3">
						<h5 class="mb-0 fw-semibold">
							<i class="bi bi-table me-2 text-primary"></i>Article Records
						</h5>
					</div>

					<!-- Table -->
					<div class="table-responsive p-3">
						<table id="articleTable" class="table table-hover align-middle mb-0">
							<thead class="table-light">
								<tr>
									<th>Article Name</th>
									<th>Content</th>
									<th>Image</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody id="articleTableBody">
								<!-- Data will be populated here via JS -->
							</tbody>
						</table>
					</div>

				</div>
			</div>
		</div>

	</div>
</main>

<?php
include 'footer.php';

?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

<!-- jQuery (required by DataTables) -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
	$(document).ready(function() {
		$('#plansTable').DataTable({
			"paging": true, // Enable pagination
			"searching": true, // Enable search
			"ordering": true, // Enable sorting
			"info": true, // Show info (e.g., "Showing 1 to 10 of 50 entries")
			"lengthMenu": [5, 10, 25, 50], // Options for rows per page
			"pageLength": 10 // Default rows per page
		});
	});
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
	// Load Articles using AJAX
	$(document).ready(function() {
		loadArticles();
	});

	function loadArticles() {
		$.ajax({
			url: 'get_articles_list.php', // PHP file to fetch articles from DB
			method: 'GET',
			dataType: 'json',
			success: function(data) {
				// Check if data is not empty
				if (data.length > 0) {
					let tableContent = '';
					data.forEach(function(article) {
						// Populate the table rows
						tableContent += `
                                <tr>
                                    <td>${article.name}</td>
                                    <td>${article.content}</td>
                                    <td><img src='${article.image}' alt='${article.name}' class='img-fluid' style='max-height: 50px;'></td>
                                    <td class='text-center'>
                                        <a href='edit_Article.php?id=${article.id}' class='btn btn-sm btn-outline-primary rounded-pill'>
                                            <i class='bi bi-pencil-square'></i> Edit
                                        </a>
                                        <button class='btn btn-sm btn-outline-danger rounded-pill delete-article' data-id='${article.id}'>
                                            <i class='bi bi-trash'></i> Delete
                                        </button>
                                    </td>
                                </tr>`;
					});

					// Insert the table content
					$('#articleTableBody').html(tableContent);
				} else {
					// If no articles found
					$('#articleTableBody').html(`
                            <tr>
                                <td colspan="4" class="text-center text-muted py-4">
                                    No Articles found.
                                </td>
                            </tr>
                        `);
				}
			},
			error: function() {
				console.error('Error fetching articles');
			}
		});
	}

	// Delete article functionality
	$(document).on('click', '.delete-article', function() {
		var articleId = $(this).data('id');
		if (confirm('Are you sure you want to delete this article?')) {
			$.ajax({
				url: 'delete_article.php', // PHP file to delete article
				method: 'POST',
				data: {
					id: articleId
				},
				success: function(response) {
					if (response === 'success') {
						alert('Article deleted successfully');
						loadArticles(); // Reload articles after deletion
					} else {
						alert('Failed to delete the article');
					}
				}
			});
		}
	});
</script>