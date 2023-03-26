<?php 
	include "db.php";
	$oid = $_POST['search_box'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Current Stock Report</title>
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
					<span class="text-white">Current Stock</span> &nbsp;
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
				<li><a href="Recived_Products.php"><i class="fas fa-inbox"></i> Received Product</a></li>
				<li><a href="new_order.php"><i class="fas fa-envelope-open-text"></i> Purchase Order Form</a></li>
				<li><a href="current_stock_report_print.php?id=<?php echo($oid) ?>"><i class="fas fa-print"></i> Print Current Stock Report</a></li>
				<li><a href="stock_details.php"><i class="fas fa-arrow-circle-left"></i> Back</a></li>
			</ul>
		</section>

		<section class="working-panel">
			<div class="container-fluid">
				<h2 style="margin-top: 10px;"> Current Stock Details</h2>

				<!-- Table -->
				<div class="all-order">
					<div class="row" style="margin-left: 00px;margin-top: 50px; padding: 0;">
						<form action="current_stock_report_new.php" method="POST" >
							<input type="text" name="search_box" class="search-box" placeholder="Category..." >
							<button class="search_btn btn btn-success"> <i class="fas fa-search"></i></button>
						</form>
						<form action="current_stock_report_new.php" method="POST" style="margin-left: 350px;">
							<input type="text" name="search_box" class="search-box" placeholder="Quantity...">
							<button class="search_btn btn btn-success"> <i class="fas fa-search"></i></button>
						</form>
					</div><hr>
					
					<div class="row" style="margin-left: 5px; background: #4353e0 ; padding-left: 40px; "  >
							<div class="col-md-2 col-xs-2" style="margin-right: 15px;"><b>Product ID</b></div>
							<div class="col-md-2 col-xs-2" style="margin-right: 80px;"><b>Product Name</b></div>
							<div class="col-md-2 col-xs-2" style="margin-right: 60px;"><b>Category</b></div>
							<div class="col-md-2 col-xs-2"><b>Available Quantity </b></div>
						</div>
					<?php
					$sql = "SELECT * FROM `product` WHERE category LIKE '$oid%' OR AvailableQuantity = '$oid'";
					$query = mysqli_query($con,$sql) or die(mysqli_error());
					if (mysqli_num_rows($query) > 0) {
						$n=0;
						while ($row=mysqli_fetch_array($query)) {
							$n++;
							$pid = $row["ProductID"];
							$pname = $row["Name"];
							$availble = $row["AvailableQuantity"];
							$cat = $row["category"];
							// $uprice = $row["price"];
							echo ($availble == 0 ? 
								'<div class="row" style="padding-left: 40px; margin-left:15px;  background-color: #ff8080">
									<div class="col-md-2">'.$pid.'</div>
									<div class="col-md-2" style="margin-right:70px">'.$pname.'</div>
									<div class="col-md-2" style="margin-right:70px">'.$cat.'</div>
									<div class="col-md-2" style="padding-right:0; text-align:center; padding-left:0;"> '.$availble.'
									</div>
								</div> <hr>' :
								 '<div class="row" style="padding-left: 40px; margin-left:15px;">
									<div class="col-md-2">'.$pid.'</div>
									<div class="col-md-2" style="margin-right:70px">'.$pname.'</div>
									<div class="col-md-2" style="margin-right:70px">'.$cat.'</div>
									<div class="col-md-2" style="padding-right:0; text-align:center; padding-left:0;"> '.$availble.'
									</div>
								</div> <hr>');
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