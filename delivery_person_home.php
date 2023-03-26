<?php 
include "db.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Delivery Person Home</title>
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
					<span class="text-white">Home</span> &nbsp;
					<i class="fas fa-bars menu-btn text-white"></i>	
				</div>	
				<a href="admin_login.php" style="color: #fff; float: right; margin-right: 45px;"><i class="fas fa-sign-out-alt text-white"></i> Logout</a></li>
			</div>
		</div>
	</header>

	<div class="wrapper">
		<section class="working-panel">
			<div class="container-fluid">
				<h1 class="display-4">Welcome to Dashboard </h1>
				<hr>
				<h2 style="padding-left: 35px;
				margin-top: 25px;">Choose Your Action :</h2>
			</div>
			<a href="delivery_details.php"><button class="sk-btn1">Delivery Details</button></a>
			<a href="delivery_person_customer_details.php"><button class="sk-btn2">Customer Details</button></a>
			<a href="delivery_person_sales_order_details.php"><button class="sk-btn3">Sales Order Details</button></a>
		</section>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="js/main.js"></script>

</body>
</html>