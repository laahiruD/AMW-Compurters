<?php 
	include "db.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Recived Product</title>
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
				<li><a href="current_stock_report.php"><i class="fas fa-chart-line"></i> Current Stock Report</a></li>
				<li><a href="Issued_products.php"><i class="fas fa-share-square"></i> Issued Product</a></li>
				<li><a href="Ordered_products.php"><i class="fas fa-inbox"></i> Orderd Product</a></li>
				<li><a href="Recived_Products.php"><i class="fas fa-inbox"></i> Recived Product</a></li>
				<li><a href="new_order.php"><i class="fas fa-envelope-open-text"></i> Purchase Order Form</a></li>
				<li><a href="stock_details.php"><i class="fas fa-arrow-circle-left"></i> Back</a></li>

			</ul>
		</section>

		<section class="working-panel">
			<div class="container-fluid">
				<h1 class="display-4">Welcome to Dashboard </h1>
				<hr>

				<!-- Table -->
				<div class="all-order mt-5">
					<h2> Recived Products Details</h2>
					<div class="search-area" style="float: left; margin-left: 10px;margin-top: 50px;">
						<form action="Recived_Products_sort.php" method="POST">
							<input type="text" name="search_box" class="search-box" placeholder="Order ID  Here...">
							<button class="search_btn btn btn-success"> <i class="fas fa-search"></i></button>
						</form>
					</div><hr>
					<a href="Add_recived_products.php"><button class="search_btn btn btn-warning" style="float: right;margin-top: 35px;"> Add New</button></a>
					<div class="row" style="margin-left: 5px; background: #4353e0 ; padding-left: 0px;"  >
						<div class="col-md-2" style="margin-right: 00px; margin-left: 0px;text-align: center;"><b>Date</b></div>
						<div class="col-md-1" style="margin-right: 0px;padding: 0;text-align: center;"><b>Order ID</b></div>
						<div class="col-md-2 " style="padding: 0px;text-align: center;" ><b>Product Name</b></div>
						<div class="col-md-2 " style="padding: 0px;text-align: center;" ><b>Supplier</b></div>
						<div class="col-md-2 " style="padding: 0px;text-align: center;"><b>Unit Price</b></div>
						<div class="col-md-1 " style="padding: 0px;text-align: center;"><b>Quantity</b></div>
						<div class="col-md-2 " style="padding: 0px;text-align: center;"><b>Total Amount</b></div>
					</div>
					<?php
					$sql = "SELECT * FROM `recived_orders";
					$query = mysqli_query($con,$sql);
					if (mysqli_num_rows($query) > 0) {
					$n=0;
						while ($row=mysqli_fetch_array($query)) {
							$n++;
							$date = $row["Date"];
							$oid = $row["OrderID"];
							$item = $row["Product"];
							$supplier = $row["Supplier"];
							$uprice = $row["Unit_price"];
							$qty = $row["Quantity"];
							$cost = $row["Cost"];
							echo 
								'<div class="row" style="margin-left: 5px; padding-left: 0px;">
								 <div class="col-md-2" style="text-align: center;">'.$date.'</div>
								 <div class="col-md-1" style="text-align: center;">'.$oid.'</div>
								 <div class="col-md-2" style="text-align: center;">'.$item.'</div>
								 <div class="col-md-2" style="text-align: center;">'.$supplier.'</div>
								 <div class="col-md-2" style="text-align: center;">'.$uprice.'</div>
								 <div class="col-md-1" style="text-align: center;">'.$qty.'</div>
								 <div class="col-md-2" style="text-align: center;">'.$cost.'</div>
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