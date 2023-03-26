<?php 
	include "db.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Reports</title>
	<link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="admin_pannel.css">
</head>
<body>


	
	<!-- Header Section -->
	<header>
		<div class="container-fluid">
			<div class="header-content">
				<div class="side-head">
					<span class="text-white">Admin Panel</span>	
				</div>	
			</div>
		</div>
	</header>

	<div class="wrapper">
		<section class="sidebar">
			<ul class="nav-bar">
				<li><a href="customer_details.php"><i class="fas fa-users"></i> Customers</a></li>
				<li><a href="sales_order.php"><i class="fas fa-clipboard-list"></i> Sales Order</a></li>
				<li><a href="admin_products_new.php"><i class="fa fa-cubes"></i> Products</a></li>
				<li><a href="Reports.php"><i class="fas fa-chart-line"></i> Reports</a></li>
				<li><a href="payment_invoice_form.html"><i class="fas fa-file-invoice-dollar"></i> Payment Invoice</a></li>
				<li><a href="clerk_Home.php"><i class="fas fa-arrow-circle-left"></i> Back</a></li>
			</ul>
		</section>

		<section class="working-panel">
			<div class="container-fluid">
				<h1 class="display-4">Welcome to Dashboard </h1>
				<hr>

				<h4>Select the Report</h4>

				<a href=Income_chart_form.html><button class="report-btn1">Monthly Sales Report</button></a>
				<a href="customer_movement_report.php"><button class="report-btn2">Customer Movement Report</button></a>
				<a href="product_demand.php"><button class="report-btn3">Product Demand Report</button></a>
			</div>
		</section>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="js/main.js"></script>

</body>
</html>