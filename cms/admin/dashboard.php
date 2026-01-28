	<?php
	include 'head.php';
	include 'sidebar.php';
	include 'header.php';

	$sql_c = "SELECT COUNT(*) AS total FROM article ";
	$res_c = $conn_douwantm->query($sql_c);
	$row_c = $res_c->fetch_assoc();

	$count_c = $row_c['total'];

	// $sql_i = "SELECT COUNT(*) AS total_i FROM invitation_workshop ";
	// $res_i = $conn_douwantm->query($sql_i);
	// $row_i = $res_i->fetch_assoc();

	// $count_i = $row_i['total_i'];

	// $sql1 = "SELECT COUNT(*) AS total1 FROM invitation_workshop WHERE plan_type = 1";
	// $res1 = $conn_douwantm->query($sql1);
	// $row1 = $res1->fetch_assoc();
	// $count1 = $row1['total1'];



	// $sql2 = "SELECT COUNT(*) AS total2 FROM invitation_workshop WHERE plan_type = 2";
	// $res2 = $conn_douwantm->query($sql2);
	// $row2 = $res2->fetch_assoc();
	// $count2 = $row2['total2'];

	?>
	<main class="content">
		<div class="container-fluid p-0">

			<h1 class="h3 mb-3"><strong></strong> Dashboard</h1>

			<div class="container mt-4">
				<div class="row g-4">

					<!-- Total Profile -->
					<div class="col-md-6 col-xl-3">
						<div class="card shadow-lg border-0 hover-scale text-white bg-gradient-primary">
							<div class="card-body d-flex align-items-center">
								<div class="icon-circle bg-white bg-opacity-25 me-3">
									<i data-feather="users"></i>
								</div>
								<div class="flex-grow-1">
									<h6 class="card-title text-white mb-1">Total Article</h6>
									<h2 class="mb-0" id="totalProfile"><?php echo $count_c; ?></h2>
									<!-- <small class="text-white-50">All registered users</small> -->
								</div>
							</div>
						</div>
					</div>

					<!-- Total Invitation -->
					<div class="col-md-6 col-xl-3 d-none">
						<div class="card shadow-lg border-0 hover-scale text-white bg-gradient-success">
							<div class="card-body d-flex align-items-center">
								<div class="icon-circle bg-white bg-opacity-25 me-3">
									<i data-feather="send"></i>
								</div>
								<div class="flex-grow-1">
									<h6 class="card-title text-white mb-1">Total Invitation</h6>
									<h2 class="mb-0" id="totalInvitation"><?php echo $count_i; ?></h2>
									<small class="text-white-50">All invitations sent</small>
								</div>
							</div>
						</div>
					</div>

					<!-- Solomon Invitation -->
					<div class="col-md-6 col-xl-3 d-none">
						<div class="card shadow-lg border-0 hover-scale text-white bg-gradient-warning">
							<div class="card-body d-flex align-items-center">
								<div class="icon-circle bg-white bg-opacity-25 me-3">
									<i data-feather="star"></i>
								</div>
								<div class="flex-grow-1">
									<h6 class="card-title text-white mb-1">Solomon Invitation</h6>
									<h2 class="mb-0" id="solomonInvitation"><?php echo $count1; ?></h2>
									<small class="text-white-50">Invitations by Solomon</small>
								</div>
							</div>
						</div>
					</div>

					<!-- Your Invitation -->
					<div class="col-md-6 col-xl-3 d-none">
						<div class="card shadow-lg border-0 hover-scale text-white bg-gradient-danger">
							<div class="card-body d-flex align-items-center">
								<div class="icon-circle bg-white bg-opacity-25 me-3">
									<i data-feather="user-check"></i>
								</div>
								<div class="flex-grow-1">
									<h6 class="card-title text-white mb-1">Your Invitation</h6>
									<h2 class="mb-0" id="yourInvitation"><?php echo $count2; ?></h2>
									<small class="text-white-50">Invitations you sent</small>
								</div>
							</div>
						</div>
					</div>

				</div>

				<!-- Optional: Progress & Chart Section -->
				
			</div>

			<style>
				/* Icon circle */
				.icon-circle {
					width: 50px;
					height: 50px;
					display: flex;
					align-items: center;
					justify-content: center;
					border-radius: 50%;
				}

				/* Hover effect */
				.hover-scale:hover {
					transform: translateY(-6px);
					transition: 0.3s ease-in-out;
				}

				/* Gradient backgrounds */
				.bg-gradient-primary {
					background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
				}

				.bg-gradient-success {
					background: linear-gradient(135deg, #00b09b 0%, #96c93d 100%);
				}

				.bg-gradient-warning {
					background: linear-gradient(135deg, #f7971e 0%, #ffd200 100%);
				}

				.bg-gradient-danger {
					background: linear-gradient(135deg, #f85032 0%, #e73827 100%);
				}

				/* Small text */
				.text-white-50 {
					font-size: 0.8rem;
				}
			</style>

			<!-- Feather Icons -->
			<script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
			<script>
				feather.replace()

				// Optional: Animated counter (simple JS)
				function animateValue(id, start, end, duration) {
					let obj = document.getElementById(id);
					let range = end - start;
					let current = start;
					let increment = end > start ? 1 : -1;
					let stepTime = Math.abs(Math.floor(duration / range));
					let timer = setInterval(function() {
						current += increment;
						obj.textContent = current;
						if (current == end) clearInterval(timer);
					}, stepTime);
				}

				// Animate all counters
				animateValue("totalProfile", 0, <?php echo $count_c; ?>, 1000);
				animateValue("totalInvitation", 0, <?php echo $count_i; ?>, 1000);
				animateValue("solomonInvitation", 0, <?php echo $count1; ?>, 1000);
				animateValue("yourInvitation", 0, <?php echo $count2; ?>, 1000);
			</script>





			<div class="row d-none">
				<div class="col-12 col-md-6 col-xxl-3 d-flex order-2 order-xxl-3">
					<div class="card flex-fill w-100">
						<div class="card-header">

							<h5 class="card-title mb-0">Browser Usage</h5>
						</div>
						<div class="card-body d-flex">
							<div class="align-self-center w-100">
								<div class="py-3">
									<div class="chart chart-xs">
										<canvas id="chartjs-dashboard-pie"></canvas>
									</div>
								</div>

								<table class="table mb-0">
									<tbody>
										<tr>
											<td>Chrome</td>
											<td class="text-end">4306</td>
										</tr>
										<tr>
											<td>Firefox</td>
											<td class="text-end">3801</td>
										</tr>
										<tr>
											<td>IE</td>
											<td class="text-end">1689</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-12 col-xxl-6 d-flex order-3 order-xxl-2">
					<div class="card flex-fill w-100">
						<div class="card-header">

							<h5 class="card-title mb-0">Real-Time</h5>
						</div>
						<div class="card-body px-4">
							<div id="world_map" style="height:350px;"></div>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-6 col-xxl-3 d-flex order-1 order-xxl-1">
					<div class="card flex-fill">
						<div class="card-header">

							<h5 class="card-title mb-0">Calendar</h5>
						</div>
						<div class="card-body d-flex">
							<div class="align-self-center w-100">
								<div class="chart">
									<div id="datetimepicker-dashboard"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row d-none">
				<div class="col-12 col-lg-8 col-xxl-9 d-flex">
					<div class="card flex-fill">
						<div class="card-header">

							<h5 class="card-title mb-0">Latest Projects</h5>
						</div>
						<table class="table table-hover my-0">
							<thead>
								<tr>
									<th>Name</th>
									<th class="d-none d-xl-table-cell">Start Date</th>
									<th class="d-none d-xl-table-cell">End Date</th>
									<th>Status</th>
									<th class="d-none d-md-table-cell">Assignee</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Project Apollo</td>
									<td class="d-none d-xl-table-cell">01/01/2023</td>
									<td class="d-none d-xl-table-cell">31/06/2023</td>
									<td><span class="badge bg-success">Done</span></td>
									<td class="d-none d-md-table-cell">Vanessa Tucker</td>
								</tr>
								<tr>
									<td>Project Fireball</td>
									<td class="d-none d-xl-table-cell">01/01/2023</td>
									<td class="d-none d-xl-table-cell">31/06/2023</td>
									<td><span class="badge bg-danger">Cancelled</span></td>
									<td class="d-none d-md-table-cell">William Harris</td>
								</tr>
								<tr>
									<td>Project Hades</td>
									<td class="d-none d-xl-table-cell">01/01/2023</td>
									<td class="d-none d-xl-table-cell">31/06/2023</td>
									<td><span class="badge bg-success">Done</span></td>
									<td class="d-none d-md-table-cell">Sharon Lessman</td>
								</tr>
								<tr>
									<td>Project Nitro</td>
									<td class="d-none d-xl-table-cell">01/01/2023</td>
									<td class="d-none d-xl-table-cell">31/06/2023</td>
									<td><span class="badge bg-warning">In progress</span></td>
									<td class="d-none d-md-table-cell">Vanessa Tucker</td>
								</tr>
								<tr>
									<td>Project Phoenix</td>
									<td class="d-none d-xl-table-cell">01/01/2023</td>
									<td class="d-none d-xl-table-cell">31/06/2023</td>
									<td><span class="badge bg-success">Done</span></td>
									<td class="d-none d-md-table-cell">William Harris</td>
								</tr>
								<tr>
									<td>Project X</td>
									<td class="d-none d-xl-table-cell">01/01/2023</td>
									<td class="d-none d-xl-table-cell">31/06/2023</td>
									<td><span class="badge bg-success">Done</span></td>
									<td class="d-none d-md-table-cell">Sharon Lessman</td>
								</tr>
								<tr>
									<td>Project Romeo</td>
									<td class="d-none d-xl-table-cell">01/01/2023</td>
									<td class="d-none d-xl-table-cell">31/06/2023</td>
									<td><span class="badge bg-success">Done</span></td>
									<td class="d-none d-md-table-cell">Christina Mason</td>
								</tr>
								<tr>
									<td>Project Wombat</td>
									<td class="d-none d-xl-table-cell">01/01/2023</td>
									<td class="d-none d-xl-table-cell">31/06/2023</td>
									<td><span class="badge bg-warning">In progress</span></td>
									<td class="d-none d-md-table-cell">William Harris</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="col-12 col-lg-4 col-xxl-3 d-flex">
					<div class="card flex-fill w-100">
						<div class="card-header">

							<h5 class="card-title mb-0">Monthly Sales</h5>
						</div>
						<div class="card-body d-flex w-100">
							<div class="align-self-center chart chart-lg">
								<canvas id="chartjs-dashboard-bar"></canvas>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</main>
	<?php
	include 'footer.php';

	?>