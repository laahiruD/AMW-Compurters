<?php
// require "config/constants.php";
include "db.php";
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>AMW Website</title>
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
					<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span><?php echo "Hi,".$_SESSION["name"]; ?></a>
					<ul class="dropdown-menu">
						<li><a href="cart.php" style="text-decoration:none; color:blue;"><span class="glyphicon glyphicon-shopping-cart">Cart</a></li>
						<li class="divider"></li>
						<li><a href="customer_order.php" style="text-decoration:none; color:blue;">Orders</a></li>
						<li class="divider"></li>
						<!-- <li><a href="" style="text-decoration:none; color:blue;">Chnage Password</a></li> -->
						<li class="divider"></li>
						<li><a href="logout.php" style="text-decoration:none; color:blue;">Logout</a></li>
					</ul>
				</li>
				</ul>
			</div>
		</div>
	</div>

</div>
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>
	<div class="container-fluid" style="margin-left: -65px;">	
		<div style="margin-left: 500px;">
			<h2 style="font-family: fantasy; margin-left: 60px;">Complete Your Order</h2>
		</div>		
	</div>
	<div class="contactForm" style="width: 500px;padding-top:30px; margin-left: 450px;">   
		<?php

		$sql = "SELECT product.ProductID,product.Name,product.price,product.AvailableQuantity,cart.id,cart.qty  FROM product INNER JOIN cart ON  product.ProductID=cart.p_id AND cart.user_id='$_SESSION[uid]'";
		$query = mysqli_query($con,$sql);

		if (mysqli_num_rows($query) > 0) {
			$arr=array();
			$cus_id=$_SESSION['uid'];
			$a=mt_rand(0,1000);
			$n=0;
			while ($row=mysqli_fetch_array($query)) {
				$n++;
				$product_id = $row["ProductID"];
				$product_title = $row["Name"];
				$product_price = $row["price"];
				$cart_item_id = $row["id"];
				$qty = $row["qty"];
				$AvailableQuantity = $row['AvailableQuantity'];
				$newqty = ($AvailableQuantity - $qty);
				echo '
					<div>
						<li>'.$product_title.' => '.CURRENCY.''.$product_price.' *'.$qty.'</li> 
					</div>';
					
					$sql2 = "INSERT INTO `salesorder`(`OID`,`ProductID`,`Quantity`,`price`, `CustomerID`) VALUES ('$a','$product_id','$qty','$product_price','$cus_id')";
					$query2 = mysqli_query($con,$sql2);
					$arr[]= $product_price*$qty ;
					$sql3 = "UPDATE product SET AvailableQuantity='$newqty' WHERE ProductID = '$product_id'";
					$query3 = mysqli_query($con,$sql3);
					$sql4 = "SELECT `first_name`, `last_name`, `Email`,  `mobile`, `Address1`, `Address2`, `postal_code` FROM `customer` WHERE CustomerID ='$_SESSION[uid]'";
					$query4 = mysqli_query($con,$sql4);
					if (mysqli_num_rows($query) > 0) {
						while ($row=mysqli_fetch_array($query4)) {
							$name1 = $row["first_name"];
							$name2 = $row["last_name"];
							$email = $row["Email"];
							$mobile = $row["mobile"];
							$address1 = $row["Address1"];
							$address2 = $row["Address2"];
							$address3 = $row["postal_code"];
						}
					}
			}
			echo '<div><h4>Total Amount:'.array_sum($arr).'.00  </h4></div>';
			echo '<form action="insert.php" method="POST">

					<div class="form-group">
						<input type="text" name="Name" class="form-control" value='.$name1.'_'.$name2.' required>
					</div>
					<div class="form-group">
						<input type="email" name="Email" class="form-control" value='.$email.' required>
					</div>
					<div class="form-group">
						<input type="tel" name="phone" class="form-control" value='.$mobile.' maxlength="10" required>
					</div>
					<div class="form-group">
						<input name="address" class="form-control" rows="3" cols="5" value='.$address1.','.$address2.','.$address3.'></textarea>
					</div>
					
					<input type="hidden" name="total" class="form-control" value='.array_sum($arr).'>
					<br>
					<input type="hidden" name="oid" class="form-control" value='.$a.'>
					<br> 
					<input type="hidden" name="uid" class="form-control" value='.$cus_id.'>
					<div class="form-group">
						<input type="submit" name="submit" value="Place Order" class="btn btn-danger btn-block" style="margin-left: 0;">
					</div>
				</form>';
	?>
	<?php
		}
			
		'</div>'
	?>	
</body>


</html>
