<?php
require "config/constants.php";
session_start();
if(!isset($_SESSION["uid"])){
	header("location:index.php");
}
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
				<ul class="nav navbar-nav" style="margin-right: 850px; width: 100%;">
					<li><img src="images/logo.png"></li>
					<li><a href="index.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
					<li><a href="products.php"><span class="glyphicon glyphicon-modal-window"></span>Product</a></li>
					<li style="float: right;"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span><?php echo "Hi,".$_SESSION["name"]; ?></a>
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
					<li style="float: right;"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart"></span>Cart<span class="badge">0</span></a>
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
				</ul>

				<ul class="nav navbar-nav navbar-right" style="width: 100%;">
					
				</ul>
			</div>
		</div>
	</div>

	<div class="row" style="background: radial-gradient(#94d1d1,#cdf7f7); margin-top: 70px;">
		<div class="col-2" style="margin-top: 50px;padding-left: 25px;">
			<h1 > Giving <br>Future <br>to your Tech! </h1>
			<p>We take pleasure in submitting our proposal for your kind perusal and do look forward to doing business with you.</p>

			<!-- <a href="" class="btn"> Explore Now &#10140;</a> -->
		</div>

		<div class="col-2">
			<img src="images/a.jpg">
		</div>	
	</div>
	
	<!-- Featured Categories Section -->

	<div class="Categories">
		<div class="small-container" style="margin: 10px;">
			<h2 class="title">Categories</h2>
			<div class="row">
				<div class="col-5">
					<img src="images/photocopy.jpeg">
					<h2>Photocopy Machines</h2>
				</div>
				<div class="col-5" >
					<img src="images/4.jpg" style="margin-top: 10px;">
					<h2>Other Accesories</h2>
				</div>
				<div class="col-5">
					<img src="images/desktop.png">
					<h2 style="font-size: 25px;">Desktops & Laptops</h2>
				</div>
				<div class="col-5">
					<img src="images/printer.jpeg">
					<h2>Printers</h2>
				</div>
				<div class="col-5">
					<img src="images/speakers.jpeg">
					<h2>Speaker Systems</h2>
				</div>
			</div>
		</div>	
	</div>

	<!-- Featured Products -->

	<div class="small-container">
		<h2 class="title">Featured Products</h2>
		<div class="row">
			<div class="col-4">
				<img src="images/msi-gl75.jpg">
				<h4>MSI GL75 Leopard Core I7 GTX1660 Ti Gaming Laptop</h4>
				<div class="rating">
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star-o"></i>
				</div>
				<p>Rs.305,000.00</p>	
			</div>	

			<div class="col-4">
				<img src="images/ERE.jpg">
				<h4>EPSON L805 6 COLOR PRINTER (INK TANK WITH WIFI)</h4>
				<div class="rating">
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star-half-o"></i>
					<i class="fa fa-star-o"></i>
				</div>
				<p>Rs.58,000.00</p>	
			</div>	

			<div class="col-4">
				<img src="images/asus_rog_thor.jpg">
				<h4>ASUS ROG-THOR-850P 850W 80+ PLATINUM MODULAR</h4>
				<div class="rating">
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star-o"></i>
				</div>
				<p>Rs.49,500.00</p>	
			</div>	

			<div class="col-4">
				<img src="images/2616.jpg">
				<h4>ASUS PRIME B460-PLUS MOTHERBOARD</h4>
				<div class="rating">
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star-o"></i>
				</div>
				<p>Rs.24,000.00</p>	
			</div>	
		</div>	
	</div>


	<!-- Team -->
	<div class="team">
		<div class="small-container">
			<h2 class="title">Meet Our Team</h2>
			<div class="row1">
				<div class="col-3">
					<br>
					<i class="fa fa-quote-left"></i>
					<br>
					<p style="font-size: 20px;">We take pleasure in  submitting  our proposal  for your <br> kind perusal and do look forward to <br> doing business with you.</p>	
					<i class="fa fa-quote-right"></i>
					<h3>Mohan Weerasinghe <br> Founder</h3>
					<img src="images/download.jpg">
					<br>
				</div>

				<div class="col-3">
					<i class="fa fa-quote-left"></i>
					<p style="font-size: 20px;">Our company was incorporated on the precept that <br>superior after sales service <br> and support are the key deciding factors when  <br>choosing Office Automation Equipment. </p>	
					<i class="fa fa-quote-right"></i>
					<h3>Kasun Gamage <br> Tech Lead</h3>
					<img src="images/download (1).jpg">
				</div>
			</div>	
		</div>
	</div>

	<!-- Brand -->
	<div class="brands">
		<div class="brand-container">
			<h2 class="title">Our Brands</h2>
			<div class="row_brands">
				<div class="col-8">
					<img src="images/dell.png">	
				</div>
				<div class="col-8">
					<img src="images/Asus-Logo.png">	
				</div>
				<div class="col-8">
					<img src="images/download.png">	
				</div>
				<div class="col-8">
					<img src="images/hp.png">		
				</div>
				<div class="col-8">
					<img src="images/Logo-Samsung.png">	
				</div>
				<div class="col-8">
					<img src="images/epson.png">	
				</div>
				<div class="col-8">
					<img src="images/gigabyte.png">	
				</div>
				<div class="col-8">
					<img src="images/sandisk.png">	
				</div>
			</div>
		</div>
	</div>

	<!-- Footer -->

	<div class="footer">
		<div class="container">
			<div class="row" >
				<div class="footer-col-1">
					<h2 style="padding-bottom: 5px;"> Contact Us</h2>
					<h4><i class="fas fa-map-marker-alt"></i>&nbsp;&nbsp;6C <br>&nbsp;&nbsp;&nbsp;&nbsp;Station Rd, <br> &nbsp;&nbsp;&nbsp;&nbsp;Negombo <br>&nbsp;&nbsp;&nbsp;&nbsp;11500</h4>
					<h4><i class="fas fa-phone-alt"></i> 0312 237 200</h4>	
				</div>

				<div class="footer-col-2">
					<h2 style="padding-bottom: 5px;"><i class="fas fa-store-alt"></i> Branches</h2>
					<h4><i class="fas fa-map-marker-alt"></i>&nbsp;&nbsp;No 31 <br>&nbsp;&nbsp;&nbsp;&nbsp;Sanasa Ideal Complex <br> &nbsp;&nbsp;&nbsp;&nbsp;Gampaha <br></h4>
					<h4><i class="fas fa-phone-alt"></i> 033 223 9222</h4>
				</div>

				<div class="footer-col-3">
					<h2 style="padding-bottom: 5px;">Follow Us</h2>
					<h4><i class="fas fa-globe"></i>&nbsp;http://www.amwcomputers.lk/</h4>
					<br>
					<h4><i class="fas fa-at"></i>&nbsp;amwcomputers.lk@gmail.com</h4>
					<br>
					<h4><i class="fab fa-facebook-square"></i> &nbsp;https://www.facebook.com/amwcomputers/</h4>
				</div>
			</div>
		</div>
	</div>
</body>
</html>










