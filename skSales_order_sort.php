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
					<h2>Sales Orders</h2><hr>
					<div class="search-area" style="float: left; margin-left: 00px;margin-top: 0px;">
						<form action="product_price_list_sort.php" method="POST">
							<input type="text" name="search_box" class="search-box" placeholder="Product Id...">
							<button class="search_btn btn btn-success"> <i class="fas fa-search"></i></button>
						</form>
					</div>
					<div class="row" style="margin-left: 5px; background: #4353e0 ; padding-left: 40px;" >
							<div class="col-md-2 col-xs-2"><b>Order ID</b></div>
							<div class="col-md-2 col-xs-2" style="padding-left: 0;"><b>Product ID</b></div>
							<div class="col-md-2 col-xs-2" style="margin-right: 0px;"><b>Name</b></div>
							<div class="col-md-2 col-xs-2" style="text-align: center; padding-left: 75px;"><b>Quantity</b></div>
							<div class="col-md-2 col-xs-2" style="padding-left: 40px;"><b>Customer ID</b></div>
							<div class="col-md-2 col-xs-2" style=" padding-left: 40px;"><b>Date</b></div>
						</div>
					<?php
					$sql = "SELECT salesorder.OrderID, salesorder.Date, salesorder.Quantity, salesorder.CustomerID, salesorder.ProductID, product.Name FROM salesorder, product WHERE salesorder.ProductID = product.ProductID AND salesorder.OrderID = '$oid'";
					$query = mysqli_query($con,$sql) or die(mysqli_error());
					if (mysqli_num_rows($query) > 0) {
						$n=0;
						while ($row=mysqli_fetch_array($query)) {
							$n++;
							$OID = $row["OrderID"];
							$PID = $row["ProductID"];
							$QTY = $row["Quantity"];
							$CID = $row["CustomerID"];
							$DATE = $row["Date"];
							$NAME = $row["Name"];
							echo 
								'<div class="row" style="padding-left: 0px;">
									<div class="col-md-2">'.$OID.'</div>
									<div class="col-md-1" style="padding:0;">'.$PID.'</div>
									<div class="col-md-3" style="padding:0; margin-left:0; margin-right:60px;">'.$NAME.'</div>
									<div class="col-md-1" style="padding-left:20; margin-right:40px;">'.$QTY.'</div>
									<div class="col-md-1" style ="margin-right:40px;">'.$CID.'</div>
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