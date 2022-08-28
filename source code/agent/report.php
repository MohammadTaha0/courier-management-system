<?php
session_start();
include '../conn.php';
if (!isset($_SESSION['auth'])) {
	$_SESSION['messege'] = "Login First";
	header("location: login.php");
} elseif (isset($_SESSION['auth'])) {
	if ($_SESSION['auth_role'] != "1") {
		$_SESSION['messege'] = "chall";
		header("location: ../index.php");
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Generate Report</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta content="" name="keywords">
	<meta content="" name="description">

	<!-- Favicon -->
	<link href="img/favicon.ico" rel="icon">

	<!-- Google Web Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

	<!-- Icon Font Stylesheet -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

	<!-- Libraries Stylesheet -->
	<link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
	<link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

	<!-- Customized Bootstrap Stylesheet -->
	<link href="css/bootstrap.min.css" rel="stylesheet">

	<!-- Template Stylesheet -->
	<link href="css/style.css" rel="stylesheet">
	<!-- font awesome icons -->
	<link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.1.2/css/all.css">
</head>

<body>
	<div class="container-xxl position-relative bg-white d-flex p-0">
		<!-- Spinner Start -->
		<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
			<div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
				<span class="sr-only">Loading...</span>
			</div>
		</div>
		<!-- Spinner End -->
		<?php

		if (isset($_SESSION['auth_user'])) {

		?>




			<!-- Sidebar Start -->
			<div class="sidebar pe-4 pb-3">
				<nav class="navbar bg-light navbar-light">
					<a href="index.php" class="navbar-brand mx-4 mb-3">
						<h3 class="text-primary"><i class="fa-light fa-box-open me-2"></i> Quriarbox</h3>
					</a>
					<div class="d-flex align-items-center ms-4 mb-4">
						<div class="position-relative">
							<img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
							<div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
						</div>
						<div class="ms-3">
							<h6 class="mb-0 text-capitalize"><?php echo $_SESSION['auth_user']['firstname'] . ' ' . $_SESSION['auth_user']['lastname']; ?></h6>
							<span>Agent</span>
						</div>
					</div>
					<div class="navbar-nav w-100">
						<a href="index.php" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
						<div class="nav-item dropdown">
							<a href="#" class="nav-link dropdown-toggle" onclick="toggle(0)"><i class="fa-regular fa-buildings me-2"></i>Branch</a>
							<div class="dropdown-menu bg-transparent border-0 toggle0">
								<a href="editbranch.php" class="dropdown-item">Edit Branch</a>
								<a href="listbranch.php" class="dropdown-item">Your Branch</a>
							</div>
						</div>
						<div class="nav-item dropdown">
							<a href="#" class="nav-link dropdown-toggle" onclick="toggle(3)"><i class="fa-regular fa-building-user me-2"></i>Agent</a>
							<div class="dropdown-menu bg-transparent border-0 toggle3">
								<a href="newagrnts.php" class="dropdown-item">Add New</a>
								<a href="listagents.php" class="dropdown-item">All Agents</a>
							</div>
						</div>
						<div class="nav-item dropdown">
							<a href="#" class="nav-link dropdown-toggle" onclick="toggle(4)"><i class="fa-regular fa-box-open me-2"></i>Courier</a>
							<div class="dropdown-menu bg-transparent border-0 toggle4">
								<a href="newcourier.php" class="dropdown-item">Add New</a>
								<a href="listcourier.php" class="dropdown-item">All Couriers</a>
								<a href="accrpt.php" class="dropdown-item">Item Accepted by couriers</a>
								<a href="collect.php" class="dropdown-item">Collected</a>
								<a href="shipped.php" class="dropdown-item">Shipped</a>
								<a href="transit.php" class="dropdown-item">In-Transit</a>
								<a href="arrived.php" class="dropdown-item">Arrived At Destination</a>
								<a href="outdelivery.php" class="dropdown-item">Out for delivery</a>
								<a href="ready.php" class="dropdown-item">Ready To Pickup</a>
								<a href="deliver.php" class="dropdown-item">Delivered</a>
								<a href="pickedup.php" class="dropdown-item">Picked-up</a>
								<a href="unsuccessdelivery.php" class="dropdown-item">Unsuccessfull Delivery</a>
							</div>
						</div>
						<a href="track.php" class="nav-item nav-link"><i class="fa-regular fa-magnifying-glass-location me-2"></i>Track Courier</a>
						<a href="report.php" class="nav-item nav-link active"><i class="fa-regular fa-square-poll-vertical me-2"></i></i>Report</a>
					</div>
				</nav>
			</div>
			<!-- Sidebar End -->



			<!-- Content Start -->
			<div class="content">
				<!-- Navbar Start -->
				<?php include 'navbar.php'; ?>
				<!-- Navbar End -->

			<?php
		}
			?>


			<!-- Recent Sales Start -->
			<div class="container">
				<div class="row" id="tableone">
					<div class="col-12 mt-4">
						<form method="POST" action="">
							<div class="row justify-content-between">
								<div class="col-2">
									<label for="">Branch</label>
									<select name="branch" id="" class="form-select mt-2">
										<option>Select</option>
										<option value="to_branch_id">To Branch</option>
										<option value="from_branch_id">From Branch</option>
									</select>
								</div>
								<div class="col-2">
									<label for="">Status</label>
									<select name="status" id="" class="form-select mt-2">
										<option>Select</option>
										<option value="0">Item Accepted by Courier</option>
										<option value="1">Collected</option>
										<option value="2">Shipped</option>
										<option value="3">In-Transit</option>
										<option value="4">Arrived At Destination</option>
										<option value="5">Out for Delivery</option>
										<option value="6">Ready to Pickup</option>
										<option value="7">Delivered</option>
										<option value="8">Picked-up</option>
										<option value="9">Unsuccessfull Delivery Attempt</option>
									</select>
								</div>
								<div class="col-2">
									<label for="">From Date:</label>
									<input type="date" class="form-control mt-2" name="fromdate">
								</div>
								<div class="col-2">
									<label for="">To Date:</label>
									<input type="date" name="todate" class="form-control mt-2">
								</div>
								<div class="col-2 mt-4 text-center">
									<button type="submit" name="submit" class="btn btn-primary">View Report</button>
								</div>
							</div>
						</form>
					</div>
					<div class="col-12 mt-5">
						<div class="row w-100 m-auto justify-content-between mb-3">
							<div class="col-6 h5">
								<button class="btn btn-dark" onclick="forpDF()"><i class="fa-solid fa-file-pdf"></i></button>
								<button class="btn btn-dark" onclick="Excel('xlsx','MyExcelSheet')"><i class="fa-solid fa-file-excel"></i></button>
								<button class="btn btn-dark" onclick="TablePrint()"><i class="fa-solid fa-print"></i></button>
							</div>
							<div class="col-4">
								<input type="text" placeholder="Search Here" class="form-control" id="search-field" onkeyup="search()">
							</div>
						</div>
						<table class="table">
							<thead>
								<tr>
									<th>#</th>
									<th>Date</th>
									<th>Sender</th>
									<th>Recepient</th>
									<th>Amount</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if (isset($_POST['submit'])) {
									$agent_branch_id = $_SESSION['auth_user']['branch_id'];
									$status = $_POST['status'];
									$fromdate = $_POST['fromdate'];
									$todate = $_POST['todate'];
									$branch = $_POST['branch'];
									if (mysqli_num_rows($sql2 = mysqli_query($con, "SELECT * FROM `tbl_courier` WHERE `status`='$status' AND `$branch`='$agent_branch_id' AND `date_created` BETWEEN '$fromdate' AND '$todate'")) > 0) {
										while ($sql2fetch = mysqli_fetch_array($sql2)) {
								?>
											<tr>
												<td><?php echo $sql2fetch['id'] ?></td>
												<td><?php echo $sql2fetch['date_created'] ?></td>
												<td><?php echo $sql2fetch['sender_name'] ?></td>
												<td><?php echo $sql2fetch['recipitent_name'] ?></td>
												<td><?php echo $sql2fetch['price'] ?></td>
												<td> <?php
														switch ($sql2fetch['status']) {
															case '1':
																echo "<span class='badge badge-pill bg-info'> Collected</span>";
																break;
															case '2':
																echo "<span class='badge badge-pill bg-info'> Shipped</span>";
																break;
															case '3':
																echo "<span class='badge badge-pill bg-primary'> In-Transit</span>";
																break;
															case '4':
																echo "<span class='badge badge-pill bg-primary'> Arrived At Destination</span>";
																break;
															case '5':
																echo "<span class='badge badge-pill bg-primary'> Out for Delivery</span>";
																break;
															case '6':
																echo "<span class='badge badge-pill bg-primary'> Ready to Pickup</span>";
																break;
															case '7':
																echo "<span class='badge badge-pill bg-success'>Delivered</span>";
																break;
															case '8':
																echo "<span class='badge badge-pill bg-success'> Picked-up</span>";
																break;
															case '9':
																echo "<span class='badge badge-pill bg-danger'> Unsuccessfull Delivery Attempt</span>";
																break;

															default:
																echo "<span class='badge bg-info'> Item Accepted by Courier</span>";
																break;
														}


														?></td>
											</tr>
								<?php
										}
									}
									else{
										?>
										<tr>
											<td colspan="6" class="text-danger text-center">No Report Found</td>
										</tr>
										<?php
									}
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- Recent Sales End -->

			</div>
			<!-- Content End -->


			<!-- Back to Top -->
			<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
	</div>

	<!-- JavaScript Libraries -->
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
	<script src="lib/chart/chart.min.js"></script>
	<script src="lib/easing/easing.min.js"></script>
	<script src="lib/waypoints/waypoints.min.js"></script>
	<script src="lib/owlcarousel/owl.carousel.min.js"></script>
	<script src="lib/tempusdominus/js/moment.min.js"></script>
	<script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
	<script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
	<!-- For PDF -->
	<script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
	<!-- For Excel  -->
	<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>

	<!-- Template Javascript -->
	<script src="js/main.js"></script>
	<script>
		function search() {
			let input = document.getElementById('search-field').value
			input = input.toLowerCase();
			let x = document.getElementsByClassName('search');

			for (i = 0; i < x.length; i++) {
				if (!x[i].innerHTML.toLowerCase().includes(input)) {
					x[i].style.display = "none";
				} else {
					if (input == "") {
						x[i].style.display = "";
					} else {
						x[i].style.display = "";
					}
				}
			}
		}

		function Excel(FileExtension, FileName) {
			var table = document.getElementById("tableone");
			var workbook = XLSX.utils.table_to_book(table, {
				sheet: "sheet1"
			});
			return XLSX.writeFile(workbook, FileName + "." + FileExtension || "Excel." + (FileExtension || "xlsx"))
		}

		function TablePrint() {
			var table = document.getElementById("tableone").innerHTML;
			var backup = document.body.innerHTML;
			document.body.innerHTML = table;
			window.print();
			document.body.innerHTML = backup;
		}

		function forpDF() {
			thisContainer = document.getElementById("tableone")
			html2pdf().from(thisContainer).save();
		}
	</script>
</body>

</html>