<?php 
	include "db.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Issued Product</title>
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
				<li><a href="issued_products.php"><i class="fas fa-share-square"></i> Issued Product</a></li>
				<li><a href="Ordered_products.php"><i class="fas fa-inbox"></i> Orderd Product</a></li>
				<li><a href="Recived_Products.php"><i class="fas fa-inbox"></i> Received Product</a></li>
				<li><a href="new_order.php"><i class="fas fa-envelope-open-text"></i> Purchase Order Form</a></li>
				<li><a href="stock_details.php"><i class="fas fa-arrow-circle-left"></i> Back</a></li>

			</ul>
		</section>

		<section class="working-panel">
			<div class="container-fluid">
				<!-- <h1 class="display-4">Welcome to Dashboard </h1>
				<hr> -->
				<h2> Issued Products Details</h2>
				<hr>
				<div>
			        <row>
			            <form action="issued_products_new.php" method="POST" style="padding-left: 70px;">
			              <br>
			              <label>From</label><br>
			              <input type="date" name="from" class="search-box" placeholder="yyyy-mm-dd" >
			              <br>
			              <br>
			              <br>
			              <label>To</label><br>
			              <input type="date" name="to" class="search-box" placeholder="yyyy-mm-dd">
			              <button class="search_btn btn btn-success"> <i class="fas fa-search"></i></button>
			            </form>
			        </row>
        		</div>
        		<br>

				<!-- Table -->
				<div class="all-order mt-5">
					<div class="row" style="margin-left: 5px; background: #4353e0 ; padding-left: 40px;"  >
						<div class="col-md-2" style="margin-right: 20px; margin-left: 0px;"><b>Date</b></div>
						<div class="col-md-2" style="margin-right: 120px;"><b>Product Name</b></div>
						<div class="col-md-2 " style="padding-left: 20px;" ><b>Unit Price</b></div>
						<div class="col-md-2 " style="padding-left: 10px;" ><b>Quantity</b></div>
						<div class="col-md-2 " style="padding-left: 10px;"><b>Total Amount</b></div>
					</div>
					<?php
					$from = $_POST['from'];
					$to = $_POST['to'];
					$sql = "SELECT salesorder.Date, salesorder.Quantity, product.price, product.Name FROM salesorder, product WHERE salesorder.ProductID = product.ProductID AND salesorder.Date BETWEEN '$from' AND '$to'";
					$query = mysqli_query($con,$sql) or die(mysqli_error());
					if (mysqli_num_rows($query) > 0) {
					$n=0;
						while ($row=mysqli_fetch_array($query)) {
							$n++;
							$date = $row["Date"];
							$pname = $row["Name"];
							$qty = $row["Quantity"];
							$uprice = $row["price"];
							$cost = $qty * $uprice;
							echo 
								'<div class="row" >
									<div class="col-md-2" style="margin-left:-195px;margin-right:0px;text-align: center;">'.$date.'</div>
									<div class="col-md-3" style="margin-right:90px;text-align: center;">'.$pname.'</div>
									<div class="col-md-2" style="padding:0px;text-align: center;">Rs.'.$uprice.'.00</div>
									<div class="col-md-2" style="padding-left:40px;text-align: center;">'.$qty.'</div>
									<div class="col-md-2" style="padding-left:40px;text-align: center;">Rs.'.$cost.'.00</div>
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