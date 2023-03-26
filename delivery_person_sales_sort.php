<?php 
	include "db.php";
	$oid = $_POST['search_box'];
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
				<li><a href="delivery_details.php"><i class="fas fa-truck"></i> Delivery Details</a></li>
				<li><a href="delivery_person_customer_details.php"><i class="fas fa-users"></i> Customer Details</a></li>
				<li><a href="delivery_person_sales_order_details.php"><i class="fas fa-clipboard-list"></i> Sales Order Details</a></li>
				<li><a href="delivery_person_home.php"><i class="fas fa-arrow-circle-left"></i> Back</a></li>
			</ul>
		</section>

		<section class="working-panel">
			<div class="container-fluid">
				<h1 class="display-4">Welcome to Dashboard </h1>
				<hr>
				<!-- Table -->
				<div class="all-order mt-5">
					<h2>Sales Orders</h2><hr>
					<div class="search-area" style="float: left; margin-left: 10px;margin-top: 0px;">
						<form action="delivery_person_sales_sort.php" method="POST">
							<input type="text" name="search_box" class="search-box" placeholder="Order Id Here...">
							<button class="search_btn btn btn-success"> <i class="fas fa-search"></i></button>
						</form>
					</div>

					<div class="row" style="margin-left: 5px; background: #4353e0 ; padding-left: 40px;" >
							<div class="col-md-2 col-xs-2"><b>Order ID</b></div>
							<div class="col-md-2 col-xs-2"><b>Product ID</b></div>
							<div class="col-md-2 col-xs-2"><b>Quantity</b></div>
							<div class="col-md-2 col-xs-2"><b>Customer ID </b></div>
							<div class="col-md-2 col-xs-2" style="padding-left: 80px;"><b>Date</b></div>
						</div>
					<?php
					$sql = "SELECT `Date`, `Quantity`, `CustomerID`, `ProductID`, `OID` FROM `salesorder` WHERE OID = '$oid'";
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