<?php 
	include "db.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Customers</title>
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
					<h2>Customer Details</h2>
					<!-- <div class="search-area">
						<form action="" method="post">
							<input type="text" name="search_box" class="search-box" placeholder="Search Here...">
							<button class="search_btn btn btn-success"> <i class="fas fa-search"></i></button>
						</form>
					</div> -->
					<div class="search-area" style="float: left; margin-left: 10px;margin-top: 50px;">
						<form action="customer_details_sort.php" method="POST">
							<input type="text" name="search_box" class="search-box" placeholder="Customer ID Here...">
							<button class="search_btn btn btn-success"> <i class="fas fa-search"></i></button>
						</form>
					</div><hr>
					<div class="row" style="margin-left: 5px; background: #4353e0 ; padding-left: 40px;"  >
							<div class="col-md-2 col-xs-2"><b>Customer ID</b></div>
							<div class="col-md-2 col-xs-2"><b>Name</b></div>
							<div class="col-md-2 col-xs-2"><b>Email</b></div>
							<div class="col-md-2 col-xs-2"><b>Contact Number</b></div>
							<div class="col-md-2 col-xs-2" style="padding-left: 60px;"><b>Address </b></div>
							<div class="col-md-2 col-xs-2" style="padding-left: 60px;"><b>Postal Code</b></div>
						</div>
					<?php
					$sql = "SELECT * FROM `customer`";
					$query = mysqli_query($con,$sql) or die(mysqli_error());
					if (mysqli_num_rows($query) > 0) {
						$n=0;
						while ($row=mysqli_fetch_array($query)) {
							$n++;
							$cid 	= $row["CustomerID"];
							$f_name = $row["first_name"];
							$l_name = $row["last_name"];
							$Email = $row["Email"];
							$Phone = $row["mobile"];
							$Address1 = $row["Address1"];
							$Address2 = $row["Address2"];
							$Postal = $row["postal_code"];

							echo 
								'<div class="row" style="padding-left: 40px; margin-left:15px;">
									<div class="col-md-2">'.$cid.'</div>
									<div class="col-md-2">'.$f_name.'  '.$l_name.'</div>
									<div class="col-md-2" style="padding-left: 0px;">'.$Email.'</div>
									<div class="col-md-2">'.$Phone.'</div>
									<div class="col-md-2" style="padding-left: 60px;">'.$Address1.','.$Address2.'</div>
									<div class="col-md-2" style="padding-left: 60px;">'.$Postal.'</div>
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