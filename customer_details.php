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

				<!-- Table -->
				<div class="all-order mt-5">
					<h2>Customer Details</h2>					
					<div class="search-area" style="float: left; margin-left: 10px;margin-top: 50px;">
						<form action="customer_details_form.php" method="POST">
							<input type="text" name="search_box" class="search-box" placeholder="Search Name or Email Here...">
							<button class="search_btn btn btn-success"> <i class="fas fa-search"></i></button>
						</form>
					</div><hr>
					<div class="row" style="margin: 0px; background: #4353e0 ; padding: 0px;"  >
						<div  style="padding: 0;width: 5%;"><b>Customer ID</b></div>
						<div  style="padding: 0;width: 20%; margin-left: 15px;text-align: center;"><b>Name</b></div>
						<div  style="padding: 0;width: 15%;"><b>NIC Number</b></div>
						<div  style="padding: 0;width: 15%;padding-left: 20px;"><b>Email</b></div>
						<div  style="padding: 0;width: 10%;"><b>Contact Number</b></div>
						<div  style="padding: 0;width: 20%;text-align: center;"><b>Address </b></div>
						<div  style="padding: 0;width: 15px;text-align: center;"><b>Postal Code</b></div>
					</div>
					<?php
					$sql = "SELECT * FROM `customer`";
					$query = mysqli_query($con,$sql) or die(mysqli_error());
					if (mysqli_num_rows($query) > 0) {
						$n=0;
						while ($row=mysqli_fetch_array($query)) {
							$n++;
							$id = $row["CustomerID"];
							$f_name = $row["first_name"];
							$l_name = $row["last_name"];
							$NIC = $row["NIC"];
							$Email = $row["Email"];
							$Phone = $row["mobile"];
							$Address1 = $row["Address1"];
							$Address2 = $row["Address2"];
							$Postal = $row["postal_code"];

							echo 
								'<div class="row" style="padding-left: 0px; margin-left:0px;">
									<div style="padding: 0;width: 5%;text-align: center;">'.$id.'</div>
									<div style="padding: 0;width: 20%; margin-left: 15px;text-align: center;">'.$f_name.'  '.$l_name.'</div>
									<div style="padding: 0;width: 15%;">'.$NIC.'</div>
									<div style="padding: 0;width: 15%;">'.$Email.'</div>
									<div style="padding: 0;width: 10%;">'.$Phone.'</div>
									<div  style="padding: 0;width: 20%;text-align: center;">'.$Address1.','.$Address2.'</div>
									<div style="padding: 0;width: 15px;text-align: center;">'.$Postal.'</div>
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
