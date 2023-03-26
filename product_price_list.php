<?php 
	include "db.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Product Price list</title>
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
				<li><a href="stock_details.php"><i class="fas fa-info-circle"></i> Stock Details</a></li>
				<li><a href="product_price_list.php"><i class="fas fa-tags"></i> Product Price list</a></li>
				<li><a href="skSales_order.php"><i class="fas fa-box-open"></i> Sales Orders</a></li>
				<li><a href="StoreKeeper_Home.php"><i class="fas fa-arrow-circle-left"></i> Back</a></li>
			</ul>
		</section>

		<section class="working-panel">
			<div class="container-fluid">
				<h1 class="display-4">Welcome to Dashboard </h1>
				<hr>

				<!-- Table -->
				<div class="all-order mt-5">
					<h2> Product Price List</h2>
					<div class="search-area" style="float: left; margin-left: 00px;margin-top: 50px;">
						<form action="product_price_list_sort.php" method="POST">
							<input type="text" name="search_box" class="search-box" placeholder="Product Id...">
							<button class="search_btn btn btn-success"> <i class="fas fa-search"></i></button>
						</form>
					</div>
					<hr>
					<div class="row" style="margin-left: 5px; background: #4353e0 ; padding-left: 40px;"  >
						<div class="col-md-3" style="margin-right: 60px; margin-left: 0px;"><b>Product ID</b></div>
						<div class="col-md-4" style="margin-right: 20px;"><b>Name</b></div>
						<div class="col-md-4" style="padding-left: 60px;" ><b>Price</b></div>
					</div>
					<?php
					$sql = "SELECT `ProductID`, `Name`, `price` FROM `product`";
					$query = mysqli_query($con,$sql) or die(mysqli_error());
					if (mysqli_num_rows($query) > 0) {
					$n=0;
						while ($row=mysqli_fetch_array($query)) {
							$n++;
							$pid = $row["ProductID"];
							$name = $row["Name"];
							$price = $row["price"];
							echo 
								'<div class="row" >
								 <div class="col-md-3" style="margin-left:-155px;margin-right:0px;">'.$pid.'</div>
								 <div class="col-md-4" style="margin-right:150px;">'.$name.'</div>
								 <div class="col-md-4" style="margin-right:40px;">Rs. '.$price.'.00</div>
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