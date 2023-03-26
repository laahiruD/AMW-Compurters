<?php 
	include "db.php";
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Order Complete</title>
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<script src="js/jquery2.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="main.js"></script>
<!-- 	<link rel="stylesheet" type="text/css" href="style.css"> -->
	<link rel="stylesheet" type="text/css" href="style2.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Nerko+One&display=swap" rel="stylesheet">
	<link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>
</head>
<body>
	<div class="wait overlay">
		<div class="loader">
			
		</div>
	</div>
	
	<div class="navbar navbar-inverse navbar-fixed-top" style="background: radial-gradient(#94d1d1,#cdf7f7); border: none; width: 100%;">
		<div class="container-fluid">	
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse" aria-expanded="false">
					<span class="sr-only">navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>

			<div class="collapse navbar-collapse" id="collapse">
				<ul class="nav navbar-nav" style="margin-right: 850px;">
					<li><img src="images/logo.png"></li>
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

	
	<div class="row" style="background: radial-gradient(#94d1d1,#cdf7f7); margin-top: 70px;">
		
		<div>
		<?php
			if(isset($_POST['submit'])){
		if(!empty($_POST['Name'])  && !empty($_POST['Email']) && !empty($_POST['phone']) && !empty($_POST['address'])){
			$name=$_POST['Name'];
			$email=$_POST['Email'];
			$phone=$_POST['phone'];
			$addrs=$_POST['address'];
			$total=$_POST['total'];
			$oid=$_POST['oid'];
			$uid=$_POST['uid'];
			$sql = "UPDATE salesorder SET delivery_address='$addrs',ReciversTP='$phone',name='$name',email='$email',Total='$total' WHERE OID='$oid'";
			$query = mysqli_query($con,$sql) or die(mysqli_error());

			$sql2 = "DELETE FROM `cart` WHERE user_id='$uid'";
			$query2 = mysqli_query($con,$sql2) or die(mysqli_error());
			$sql3 = "INSERT INTO `delivery`(`OrderID`, `CustomerID`, `Reciver`, `ReciversTp`, `ReciversAdd`) VALUES('$oid','$uid','$name','$phone','$addrs')";
			$query3 = mysqli_query($con,$sql3);
					if ($query  ) {
						echo "<div>
								<h2>Order Placed!</h2>
								<h4>Your Order Id is : ".$oid."</h4>
							</div>";
					}else{
						echo "Something went wrong!";
					}
		}
			}
		?>
	</div> 
	
	</div>
	<div style="margin-top: 150px; margin-left: 340px;">
		<p style="font-size: 55px;">Thank You for shopping with us!</p>
	</div>
	<div style="margin-top: 50px; margin-left: 580px;">
		<button onclick="window.location.href='customer_order.php'" style="width: 200px; height: 50px; font-weight: 750; border-radius: 20px; background: #5787d4;" >Check Your Orders</button>
</body>
</html>


