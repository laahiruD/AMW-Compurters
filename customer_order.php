<?php
//require "config/constants.php";

session_start();
if(!isset($_SESSION["uid"])){
	header("location:index.php");
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Order</title>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<script src="js/jquery2.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="main.js"></script>
		<style>
			table tr td {padding:10px;}
		</style>
	</head>
<body>
	<div class="navbar navbar-inverse navbar-fixed-top" style="background: radial-gradient(#94d1d1,#cdf7f7); border: none; width: 100%;">
		<div class="container-fluid">	
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse" aria-expanded="false">
					<span class="sr-only"> navigation toggle</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
		<div class="collapse navbar-collapse" id="collapse">
			<ul class="nav navbar-nav">
				<li><a href="index.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
				<li><a href="products.php"><span class="glyphicon glyphicon-modal-window"></span>Product</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart"></span>Cart<span class="badge">0</span></a>
						<div class="dropdown-menu" style="width:400px;">
							<div class="panel panel-success">
								<div class="panel-heading">
									<div class="row">
										<div class="col-md-3">Sl.No</div>
										<div class="col-md-3">Product Image</div>
										<div class="col-md-3">Product Name</div>
										<div class="col-md-3">Price in <?php echo CURRENCY; ?></div>
									</div>
								</div>
								<div class="panel-body">
									<div id="cart_product">
									</div>
								</div>
								<div class="panel-footer"></div>
							</div>
						</div>
					</li>
				<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span><?php echo "Hi,".$_SESSION["name"]; ?></a>
					<ul class="dropdown-menu">
						<li><a href="cart.php" style="text-decoration:none; color:blue;"><span class="glyphicon glyphicon-shopping-cart">Cart</a></li>
						<li class="divider"></li>
						<li><a href="customer_order.php" style="text-decoration:none; color:blue;">Orders</a></li>
						<!-- <li class="divider"></li>
						<li><a href="" style="text-decoration:none; color:blue;">Chnage Password</a></li> -->
						<li class="divider"></li>
						<li><a href="logout.php" style="text-decoration:none; color:blue;">Logout</a></li>
					</ul>
				</li>
				
			</ul>
		</div>
	</div>
	</div>
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>
	<div class="container-fluid">
			<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="panel panel-primary" style="width: 1000px; margin-left: -85px;" >
					<div class="panel-heading">Order Details </div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-2 col-xs-2" ><b>Order ID</b></div>
							<div class="col-md-2 col-xl-2" style="width: 400px;"><b>Product Name</b></div>
							<div class="col-md-2 col-xs-2"><b>Quantity</b></div>
							<div class="col-md-2 col-xs-2"><b>Product Price</b></div>
						</div>
						<div>
							<?php 
								include_once("db.php");
								$user_id = $_SESSION["uid"];
								$orders_list = "SELECT o.OID,o.customerID,o.ProductID,o.Quantity,o.price,p.Name FROM salesorder o,product p WHERE o.ProductID=p.ProductID AND o.customerID=$user_id"; 
								$query = mysqli_query($con,$orders_list);
							if (mysqli_num_rows($query) > 0) {
								while ($row=mysqli_fetch_array($query)) {
									$OID = $row["OID"];
									$product_title = $row["Name"];
									$product_price = $row["price"];
									$qty = $row["Quantity"];

									echo 
										'<div class="row" style="margin-top:25px;">
											<div class="col-md-2">'.$OID.'</div>
											<div class="col-md-2"  style="width: 400px;">'.$product_title.'</div>
											<div class="col-md-2">'.$qty.'</div>
											<div class="col-md-2">'.$product_price.'</div> 					
										</div> <hr>';
 
								}
							}?>
						</div>

						</div> 
					</div>
					<div class="panel-footer"></div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>	
	</div>

	<br>
	<br>
	<br>
	<div class="container-fluid">
			<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="panel panel-primary" style="width: 1000px; margin-left: -85px;" >
					<div class="panel-heading">Receiver's Details </div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-2 col-xs-2" ><b>Order ID</b></div>
							<div class="col-md-2 col-xs-2" ><b>Date</b></div>
							<div class="col-md-2 col-xl-2" ><b>Receiver</b></div>
							<div class="col-md-2 col-xs-2" style="width:300px;"><b>Receiver's Address</b></div>
							<div class="col-md-2 col-xs-2"><b>Total</b></div>
						</div>
						<div>
							<?php 
								include_once("db.php");
								$user_id = $_SESSION["uid"];
								$orders_list = "SELECT `Date`, `delivery_address`, `name`, `OID`,`Total` FROM `salesorder` WHERE customerID=$user_id GROUP BY OID"; 
								$query = mysqli_query($con,$orders_list);
							if (mysqli_num_rows($query) > 0) {
								while ($row=mysqli_fetch_array($query)) {
									$OID = $row["OID"];
									$Date = $row["Date"];
									$Reciver = $row["name"];
									$ReciverAddress = $row["delivery_address"];
									$Total = $row["Total"];

									echo 
										'<div class="row" style="margin-top:25px;">
											<div class="col-md-2">'.$OID.'</div>
											<div class="col-md-2"  >'.$Date.'</div>
											<div class="col-md-2">'.$Reciver.'</div>
											<div class="col-md-2" style="width:300px;">'.$ReciverAddress.'</div> 	
											<div class="col-md-2" >'.$Total.'</div> 				
										</div> <hr>';
 
								}
							}?>
						</div>

						</div> 
					</div>
					<div class="panel-footer"></div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>	
	</div>

</body>
</html>
