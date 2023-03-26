<?php 
	include "db.php";	
	$oid = $_POST['search_box'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Payment Invoice</title>
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
				<li><a href="customer_details.php"><i class="fas fa-users"></i> Customers</a></li>
				<li><a href="sales_order.php"><i class="fas fa-clipboard-list"></i> Sales Order</a></li>
				<li><a href="admin_products_new.php"><i class="fas fa-chart-line"></i> Products</a></li>
				<li><a href="Reports.php"><i class="fas fa-chart-line"></i> Reports</a></li>
				<li><a href="payment_invoice_form.html"><i class="fas fa-file-invoice-dollar"></i> Payment Invoice</a></li>
				<li><a href="payment_invoice_form.html"><i class="fas fa-arrow-circle-left"></i> Back</a></li>
				<li>
        			<form action="payment_invoice_print.php" method="POST" style="padding-left: 50px;">
          				<input type="hidden" name="oid" class="search-box"  value = <?php  echo $oid; ?> >
          				<button> <i class="fas fa-print"></i>Print Report</button>
        			</form>
      			</li>
			</ul>
		</section>

		<section class="working-panel">
			<div class="container-fluid">
				<h1 class="display-4">Welcome to Dashboard </h1>
				<hr>

				<!-- Table -->
				<div class="all-order mt-5">
					<h2>Payment Invoice</h2>
					<hr>
					<div class="row" style="margin-left: 5px; background: #4353e0 ; padding-left: 40px;"  >
							<div class="col-md-2 col-xs-2"><b>Product ID</b></div>
							<div class="col-md-2 col-xs-2"><b>Product Name</b></div>
							<div class="col-md-2 col-xs-2"><b>Barand & Model </b></div>
							<div class="col-md-2 col-xs-2"><b>Quantity</b></div>
							<div class="col-md-2 col-xs-2"><b>Unit Price</b></div>
							<div class="col-md-2 col-xs-2"><b>Amount</b></div>
						</div>
					<?php
					
					$sql = "SELECT salesorder.ProductID, product.Name, product.Brand, salesorder.Quantity, salesorder.price, salesorder.Total FROM salesorder, product WHERE salesorder.ProductID = product.ProductID AND OID = '$oid'";
					$query = mysqli_query($con,$sql) or die(mysqli_error());
					if (mysqli_num_rows($query) > 0) {
						$n=0;
						while ($row=mysqli_fetch_array($query)) {
							$n++;
							$pid = $row["ProductID"];
							$name = $row["Name"];
							$brand = $row["Brand"];
							$qty = $row["Quantity"];
							$unitprice = $row["price"];
							$total = $row["Total"];
							$amount = $row["Quantity"] * $row["price"] ;
				
							echo 
								'<div class="row" style="padding-left: 40px; margin-left:15px;">
									<div class="col-md-2">'.$pid.'</div>
									<div class="col-md-2" style="padding-left: 0px;">'.$name.'</div>
									<div class="col-md-2">'.$brand.'</div>
									<div class="col-md-2" style="padding-left: 40px;">'.$qty.'</div>
									<div class="col-md-2" style="padding-left: 30px;">'.$unitprice.'</div>
									<div class="col-md-2" style="padding-left: 30px;">'.$amount.'</div>
								</div> <hr>';
						}
						echo '<div class="row">
						<div class="col-md-2" style="padding-left: 580px;"><b> Grand Total </b></div>
						<div class="col-md-2" style="padding-left: 140px;"><b>'.$total.'</b></div>';
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