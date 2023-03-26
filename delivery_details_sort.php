<?php 
include "db.php";
$oid = $_POST['search_box'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Delivery Details</title>
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
					<span class="text-white">Admin Panel</span> &nbsp;
					<i class="fas fa-bars menu-btn text-white"></i>	
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
					<h2> Delivery Details</h2>
					<div class="search-area" style="float: left; margin-left: 5px;margin-top: 50px;">
						<form action="delivery_details_sort.php" method="POST">
							<input type="text" name="search_box" class="search-box" placeholder="Order Id Here...">
							<button class="search_btn btn btn-success"> <i class="fas fa-search"></i></button>
						</form>
					</div><hr>
					<div class="row" style="margin-left: 5px; background: #4353e0 ; padding-left: 40px;">
						<div class="col-md-1" style="margin-right: 30px;"><b>Date</b></div>
						<div class="col-md-2 " style="padding-left: 0px;margin-right: -10px;" ><b>Delivery ID</b></div>
						<div class="col-md-1 " style="padding-left: 0px;" ><b>Order ID</b></div>
						<div class="col-md-2 " style="padding-left: 30px;margin-right: 25px;"><b>Customer ID</b></div>
						<div class="col-md-1 " style="padding-left: 0px;margin-right: 65px;"><b>Reciver</b></div>
						<div class="col-md-2 " style="padding-left: 0px;margin-right:0px;"><b>Contact No.</b></div>
						<div class="col-md-1 " style="padding-left: 6	0px;"><b>Address</b></div>
					</div>
					<?php
					$sql = "SELECT `DeliveryID`, `Date`, `OrderID`, `CustomerID`, `Reciver`, `ReciversTp`, `ReciversAdd` FROM `delivery` WHERE OrderID = '$oid'";
					$query = mysqli_query($con,$sql) or die(mysqli_error());
					if (mysqli_num_rows($query) > 0) {
					$n=0;
						while ($row=mysqli_fetch_array($query)) {
							$n++;
							$did = $row["DeliveryID"];
							$date = $row["Date"];
							$oid = $row["OrderID"];
							$cid = $row["CustomerID"];
							$reciver = $row["Reciver"];
							$add = $row["ReciversAdd"];
							$tp = $row["ReciversTp"];
							echo 
								'<div class="row" >
								 <div class="col-md-2" style="margin-left:-195px;margin-right:0px;">'.$date.'</div>
								 <div class="col-md-2" style="margin-right:0px;">'.$did.'</div>
								 <div class="col-md-2" style="margin-right:0px;padding:0px;">'.$oid.'</div>
								 <div class="col-md-1" style="padding-left:0px; padding-right:0;">'.$cid.'</div>
								 <div class="col-md-2" style="margin-left:40px;">'.$reciver.'</div>
								 <div class="col-md-2" style="padding-left:0px;">'.$tp.'</div>
								 <div class="col-md-2" style="padding-left:0px;margin-left:30px;">'.$add.'</div>
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