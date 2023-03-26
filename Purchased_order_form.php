<?php 
	include "db.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Purchase Order Form</title>
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
				<li><a href="new_order.php"><i class="fas fa-envelope-open-text"></i> Purchase Order Form</a></li>
				<!-- <li><a href="purchase_order_report_print.php"><i class="fas fa-print"></i> Print Purchase order Report</a></li> -->
				<li><a href="stock_details.php"><i class="fas fa-arrow-circle-left"></i> Back</a></li>
			</ul>
		</section>

		<section class="working-panel">
			<div class="container-fluid">
				<h1 class="display-4">Welcome to Dashboard </h1>
				<hr>

				<!-- Table -->
				<div class="all-order mt-5">
					<h2> Purchased Order Details</h2>
					<hr>
					<a href="new_order.php"><button style="margin-left: 900px; background-color: #5e72f2; margin-bottom: 10px; border-radius: 5px;">New Order</button></a>
					<div class="row" style="margin-left: 5px; background: #4353e0 ; padding-left: 40px;"  >
						<div class="col-md-2" style="margin-right: 20px; margin-left: -10px;"><b>Order ID</b></div>
						<div class="col-md-2" style="margin-right: 100px;"><b>Date</b></div>
						<div class="col-md-2 " style="padding-left: 0px;" ><b>Item</b></div>
						<div class="col-md-2 " style="padding-left: 35px;" ><b>Quantity</b></div>
						<div class="col-md-2 " style="padding-left: 40px;"><b>Supplier</b></div>
					</div>
					<?php
					$sql = "SELECT purchaseorder.PurchaseID, purchaseorder.Date, purchaseorder.Item, purchaseorder.Quantity, supplier.Name FROM purchaseorder, supplier WHERE purchaseorder.supplier = supplier.SupplierID";
					$query = mysqli_query($con,$sql) or die(mysqli_error());
					if (mysqli_num_rows($query) > 0) {
					$n=0;
						while ($row=mysqli_fetch_array($query)) {
							$n++;
							$pid = $row["PurchaseID"];
							$date = $row["Date"];
							$item = $row["Item"];
							$qty = $row["Quantity"];
							$supplier = $row["Name"];
							echo 
								'<div class="row" >
								 <div class="col-md-2" style="margin-left:-165px;margin-right:0px;">'.$pid.'</div>
								 <div class="col-md-2" style="margin-right:10px;">'.$date.'</div>
								 <div class="col-md-4" style="margin-right:40px;">'.$item.'</div>
								 <div class="col-md-2" style="padding-left:20px; padding-right:0;">'.$qty.'</div>
								 <div class="col-md-2" style="padding-left:0px;">'.$supplier.'</div>
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