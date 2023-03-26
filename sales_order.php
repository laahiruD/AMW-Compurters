<?php 
	include "db.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sales Order</title>
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
				<!-- <h1 class="display-4">Welcome to Dashboard </h1>
				<hr> -->

				<!-- Table -->
				<div class="all-order mt-5">
					<h2>Sales Orders</h2><hr>
					<div style="padding-bottom: 15px">
						<form action="sales_order_sort.php" method="POST" style="padding-left: 70px;">
				          <br>
				          <label>From</label><br>
				          <input type="date" name="from" class="search-box" placeholder="yyyy-mm-dd" >
				          <br>
				          <br>
				          <br>
				          <label>To</label><br>
				          <input type="date" name="to" class="search-box" placeholder="yyyy-mm-dd">
				          <button class="search_btn btn btn-success"> <i class="fas fa-search"></i></button>
        				</form>
					</div>

					<div class="row" style="margin-left: 5px; background: #4353e0 ; padding-left: 40px;margin-top: 70px;">
							<div class="col-md-2 col-xs-2"><b>Order ID</b></div>
							<div class="col-md-2 col-xs-2"><b>Product ID</b></div>
							<div class="col-md-2 col-xs-2"><b>Quantity</b></div>
							<div class="col-md-2 col-xs-2"><b>Customer ID </b></div>
							<div class="col-md-2 col-xs-2" style="padding-left: 80px;"><b>Date</b></div>
						</div>
					<?php
					$sql = "SELECT `Date`, `Quantity`, `CustomerID`, `ProductID`, `OID` FROM `salesorder`";
					$query = mysqli_query($con,$sql) or die(mysqli_error());
					if (mysqli_num_rows($query) > 0) {
						$n=0;
						while ($row=mysqli_fetch_array($query)) {
							$n++;
							$OID = $row["OID"];
							$PID = $row["ProductID"];
							$QTY = $row["Quantity"];
							$CID = $row["CustomerID"];
							$DATE = $row["Date"];

							echo 
								'<div class="row" style="padding-left: 0px;">
									<div class="col-md-2">'.$OID.'</div>
									<div class="col-md-2">'.$PID.'</div>
									<div class="col-md-2">'.$QTY.'</div>
									<div class="col-md-2">'.$CID.'</div>
									<div class="col-md-2">'.$DATE.'</div>
								</div> <hr>';

						}
					}
					?>
				</div>
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