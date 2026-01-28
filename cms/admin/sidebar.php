	<style>
		.sidebar-dropdown {
			display: none;
			list-style: none;
			padding-left: 20px;
		}

		.sidebar-item.active .sidebar-dropdown {
			display: block;
		}

		.sidebar-dropdown li a {
			display: block;
			padding: 10px 20px;
			font-size: 14px;
			color: #6c757d;
			/* subtle gray */
			text-decoration: none;
			border-radius: 4px;
			transition: all 0.2s ease;
		}

		.sidebar-dropdown li a.active {
			background-color: #0056b3;
			color: white;
			font-weight: 600;
		}

		/* Optional: add small arrow for dropdown items */
		.sidebar-dropdown li a:hover {
			background-color: #007bff;
			/* bootstrap primary blue */
			color: white;
			padding-left: 25px;
			/* slight indent on hover */
		}

		/* Rotate arrow if link is active */
		.sidebar-dropdown li a.active::after {
			transform: rotate(180deg);
			border-top-color: white;
		}
	</style>


	<nav id="sidebar" class="sidebar js-sidebar">
		<div class="sidebar-content js-simplebar">
			<a class="sidebar-brand" href="index.html">
				<span class="align-middle">CMS</span>
			</a>

			<ul class="sidebar-nav">
				<!-- Dashboard Section -->
				<li class="sidebar-header text-uppercase text-muted mb-2">Dashboard</li>
				<li class="sidebar-item active">
					<a class="sidebar-link" href="dashboard.php">
						<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
					</a>
				</li>

				<!-- Workshop Details Section -->
				<li class="sidebar-header text-uppercase text-muted mb-2">Article Details</li>
				<li class="sidebar-item">
					<a class="sidebar-link" href="add_article.php">
						<i class="align-middle" data-feather="plus-square"></i> <span class="align-middle">Add Article</span>
					</a>
				</li>
				<li class="sidebar-item">
					<a class="sidebar-link" href="list_article.php">
						<i class="align-middle" data-feather="list"></i> <span class="align-middle">Article List</span>
					</a>
				</li>
				
			</ul>



		</div>
	</nav>
	<script>
		document.querySelectorAll('.dropdown-toggle').forEach(item => {
			item.addEventListener('click', function() {
				this.parentElement.classList.toggle('active');
			});
		});
	</script>