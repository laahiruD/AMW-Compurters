<!DOCTYPE html>
<html>
<head>
	<title>Clerk Home</title>
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
					<span class="text-white">Home</span>	
				</div>	
				<a href="admin_login.php" style="color: #fff; float: right; margin-right: 45px;"><i class="fas fa-sign-out-alt text-white"></i> Logout</a></li>
			</div>
		</div>
	</header>

	<div class="wrapper">
		<section class="working-panel">
			<div class="container-fluid" style="margin-left: 50px;">
				<h1 class="display-4">Welcome to Dashboard </h1>
				<hr>
				<h2 style="padding-left: 35px;
				margin-top: 25px;">Choose Your Action :</h2>
				<div class="row" style="padding-left: 50px;">
					<div class="col-md-3">
						<div class="card bg-orange-g text-white">
							<div class="card-body">
								<h4 class="font-weight-light" style="text-align: center;"><i class="fas fa-users"></i> </h4>
								<hr>
								<h5 style="text-align: center;"><b> <a href="customer_details.php" style="color: #fff;">Customer Details</a></b></h5>
							</div>
						</div>
					</div>

					<div class="col-md-3">
						<div class="card bg-green-g text-white">
							<div class="card-body">
								<h4 class="font-weight-light" style="text-align: center;"><i class="fas fa-clipboard-list"></i> </h4>
								<hr>
								<h5 style="text-align: center;"><b><a href="sales_order.php" style="color: #fff;">Sales Order Details</a></b></h5>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="card bg-golden-g text-white">
							<div class="card-body">
								<h4 class="font-weight-light" style="text-align: center;" ><i class="fa fa-cubes"></i> </h4>
								<hr>
								<h5 style="text-align: center;"><b><a href="admin_products_new.php" style="color: #fff;"> Products</a></b></h5>
							</div>
						</div>
					</div>
				</div>
				<div class="row" style="padding-left: 250px;">
					<div class="col-md-3">
						<div class="card bg-primary-g text-white">
							<div class="card-body">
								<h4 class="font-weight-light" style="text-align: center;"><i class="fas fa-chart-line"></i></h4>
								<hr>
								<h5 style="text-align: center;"><b><a href="Reports.php" style="color: #fff;">Reports</a></b></h5>
							</div>
						</div>
					</div>

					<div class="col-md-3">
						<div class="card bg-golden-g text-white">
							<div class="card-body">
								<h4 class="font-weight-light" style="text-align: center;" ><i class="fas fa-file-invoice-dollar"></i> </h4>
								<hr>
								<h5 style="text-align: center;"><b><a href="payment_invoice_form.html" style="color: #fff;">Payment Invoices</a></b></h5>
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