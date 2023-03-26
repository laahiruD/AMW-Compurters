<!DOCTYPE html>
<html>
<head>
	<title>Stock Details</title>
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
				<h2 style="padding-left: 35px;
				margin-top: 25px;">Choose Your Action :</h2>
				<div class="row" style="padding-left: 00px;">
					<div class="col-md-3">
						<div class="card bg-orange-g text-white" style="width: 250px; height: 150px;">
							<div class="card-body">
								<h4 class="font-weight-light" style="text-align: center;"><i class="fas fa-chart-line"></i> </h4>
								<hr>
								<h5 style="text-align: center;"><b> <a href="current_stock_report.php" style="color: #fff;">Current Stock Report</a></b></h5>
							</div>
						</div>
					</div>

					<div class="col-md-3">
						<div class="card bg-green-g text-white" style="width: 250px; height: 150px;">
							<div class="card-body">
								<h3 class="font-weight-light" style="text-align: center;"><i class="fas fa-share-square"></i> </h3>
								<hr>
								<h5 style="text-align: center;"><b><a href="Issued_products.php" style="color: #fff;">Issued Products</a></b></h5>
							</div>
						</div>
					</div>

					<div class="col-md-3">
						<div class="card bg-golden-g text-white" style="width: 250px; height: 150px;">
							<div class="card-body">
								<h4 class="font-weight-light" style="text-align: center;" ><i class="fa fa-cubes"></i> </h4>
								<hr>
								<h5 style="text-align: center;"><b><a href="Recived_Products.php" style="color: #fff;"> Received Products</a></b></h5>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-3">
						<div class="card bg-primary-g text-white" style="width: 250px; height: 150px;">
							<div class="card-body">
								<h4 class="font-weight-light" style="text-align: center;"><i class="fas fa-inbox"></i></h4>
								<hr>
								<h5 style="text-align: center;"><b><a href="Ordered_products.php" style="color: #fff;">Orderd Products</a></b></h5>
							</div>
						</div>
					</div>

					<div class="col-md-3">
						<div class="card bg-golden-g text-white" style="width: 250px; height: 150px;">
							<div class="card-body">
								<h4 class="font-weight-light" style="text-align: center;" ><i class="fas fa-envelope-open-text"></i> </h4>
								<hr>
								<h5 style="text-align: center;"><b><a href="new_order.php" style="color: #fff;">Purchase Order Form</a></b></h5>
							</div>
						</div>
					</div>
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