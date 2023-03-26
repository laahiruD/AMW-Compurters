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
				<li><a href="stock_details.php"><i class="fas fa-arrow-circle-left"></i> Back</a></li>
			</ul>
		</section>

		<section class="working-panel">
			<div class="container-fluid">
				<h3 class="display-4">Purchase Order</h3>
				<hr>
				<div>
					
					<form action="add_new_order.php" method="POST" style="width: 50%; margin-left: 250px; margin-top: 100px;">
						<div class="form-group">
							<input type="text" name="Oid" class="form-control" value="<?php echo($Oid + 1) ?>" required style="width:50px;">
						</div>
						<div class="form-group">
							<input type="date" name="Date" class="form-control" placeholder="Date" style="width:250px" required>
						</div>
						<!-- <div class="form-group">
							<div>
								<input type="text" name="Item" class="form-control" placeholder="Item" style="width:250px" required>
							<input type="text" name="qty" class="form-control" placeholder="Quantity" style="width:250px; margin-left: 250px;margin-top: 0;" required>	
							</div>	
						</div> -->

						<div class="row" style="padding-left: 0; margin-left: 0;padding-top: 0;">
							<div class="col-md-6" style="padding-left: 0;">
								<input type="text" name="Item" class="form-control" placeholder="Item">
							</div>
							<div class="col-md-6">
								<input type="text"  name="qty"class="form-control" placeholder="Quantity">
							</div>
						</div>
						<div class="row" style="padding-left: 0; margin-left: 0;padding-top: 0;">
							<div class="col-md-6" style="padding-left: 0;">
								<input type="text" name="Item" class="form-control" placeholder="Item">
							</div>
							<div class="col-md-6">
								<input type="text"  name="qty"class="form-control" placeholder="Quantity">
							</div>
						</div>
						<div class="row" style="padding-left: 0; margin-left: 0;padding-top: 0;">
							<div class="col-md-6" style="padding-left: 0;">
								<input type="text" name="Item" class="form-control" placeholder="Item">
							</div>
							<div class="col-md-6">
								<input type="text"  name="qty"class="form-control" placeholder="Quantity">
							</div>
						</div>
						<div class="row" style="padding-left: 0; margin-left: 0;padding-top: 0;">
							<div class="col-md-6" style="padding-left: 0;">
								<input type="text" name="Item" class="form-control" placeholder="Item">
							</div>
							<div class="col-md-6">
								<input type="text"  name="qty"class="form-control" placeholder="Quantity">
							</div>
						</div>
						
						<!-- <div class="form-group">
							<input type="text" name="qty" class="form-control" placeholder="Quantity" style="width:250px" required>
						</div> -->
						<div class="form-group" style="margin-top: 15px;">
							<input type="submit" name="submit" value="Place Order" class="btn btn-danger btn-block" style="margin-left: 0; width: 22%; float: left;">
						</div>
					</form>
					<a href='new_order_print.php?id=<?php echo($Oid) ?>' style="padding-left: 250px;">Print Order</a>
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