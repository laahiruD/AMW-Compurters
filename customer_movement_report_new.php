<?php 
	include "db.php";
	$from = $_POST['from'];
	$to = $_POST['to'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Customer Movement Report</title>
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
	</header>

	<div class="wrapper">
		<section class="sidebar">
			<ul class="nav-bar">
				<li><a href= "sales_report_form.html"><i class="fas fa-chart-line"></i> Monthly Sales Report</a></li>
				<li><a href="product_demand.php"><i class="fas fa-chart-line"></i> Product Demand Report</a></li>
				<li><a href="Reports.php"><i class="fas fa-arrow-circle-left"></i> Back</a></li>
				<li><a href="customer_movement_report_print.php?id1=<?php echo($from) ?>&id2=<?php echo($to) ?>"><i class="fas fa-print"></i> Print Report</a></li>
			</ul>
		</section>

		<section class="working-panel">
			<div class="container-fluid">
				<h1 class="display-4">Welcome to Dashboard </h1>
				<hr>

				<!-- Table -->
				<div class="all-order">
					<!-- <h2>Customer Movement Report</h2><hr> -->
					<form action="customer_movement_report_new.php" method="POST" style="padding-left: 70px;">
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

					<div class="row" style="width: 800px; background: #4353e0; padding-left: 0px;margin-top: 70px;"  >
							<div class="col-md-2 col-xs-2" style="padding-left: 20px;"><b>Customer ID</b></div>
							<div class="col-md-2 col-xs-2" style="padding-left: 95px;"><b>Name</b></div>
							<div  style="padding-left: 150px; "><b>Number of Orders</b></div>
						</div>
					<?php
					$sql = "SELECT DISTINCT salesorder.CustomerID, customer.first_name, customer.last_name, COUNT(OID) FROM salesorder, customer WHERE salesorder.CustomerID = customer.CustomerID AND Date BETWEEN '$from' AND '$to' GROUP BY salesorder.CustomerID ORDER BY COUNT(OID) DESC";
					$query = mysqli_query($con,$sql) or die(mysqli_error());
					if (mysqli_num_rows($query) > 0) {
						$n=0;
						while ($row=mysqli_fetch_array($query)) {
							$n++;
							$cid = $row["CustomerID"];
							$f_name = $row["first_name"];
							$l_name = $row["last_name"];
							$No_of_Orders = $row["COUNT(OID)"];
							echo 
								'<div class="row" style="padding-left: 110px; margin-left:0px;">
									<div class="col-md-2">'.$cid.'</div>
									<div class="col-md-2" style="padding-left: 35px; ">'.$f_name.'  '.$l_name.'</div>
									<div class="col-md-2" style="padding-left: 120px; ">'.$No_of_Orders.'</div>
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