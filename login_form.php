<?php
#this is Login form page , if user is already logged in then we will not allow user to access this page by executing isset($_SESSION["uid"])
#if below statment return true then we will send user to their profile.php page
if (isset($_SESSION["uid"])) {
	header("location:profile.php");
}
//in action.php page if user click on "ready to checkout" button that time we will pass data in a form from action.php page
if (isset($_POST["login_user_with_product"])) {
	//this is product list array
	$product_list = $_POST["product_id"];
	//here we are converting array into json format because array cannot be store in cookie
	$json_e = json_encode($product_list);
	//here we are creating cookie and name of cookie is product_list
	setcookie("product_list",$json_e,strtotime("+1 day"),"/","","",TRUE);

}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Login</title>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<script src="js/jquery2.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="main.js"></script>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
<body style="background: linear-gradient(120deg,#2980b9,#8e44ad);">
<div class="wait overlay">
	<div class="loader"></div>
</div>
	<div class="navbar navbar-inverse navbar-fixed-top" style="background: radial-gradient(#94d1d1,#cdf7f7); border: none; width: 100%;">
		<div class="container-fluid">	
			<div class="navbar-header">
			</div>
			<ul class="nav navbar-nav">
				<li><img src="images/logo.png"></li>
				<li><a href="index.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
				<li><a href="products.php"><span class="glyphicon glyphicon-modal-window"></span>Product</a></li>
			</ul>
		</div>
	</div>
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8" id="signup_msg">
				<!--Alert from signup form-->
			</div>
			<div class="col-md-2"></div>
		</div>
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<div class="panel panel-primary" style="margin-top:65px; height: 400px;border-radius: 29px;">
					<div class="panel-body">
						<!--User Login Form-->
						<div style="background: #fff; margin-top: -10px;">
							<h1 style="text-align: center; font-family: cursive;">Login</h1>
						</div>
						<br>
						<form onsubmit="return false" id="login">
							<label for="email">Email</label>
							<input type="email" class="form-control" name="email" id="email" required/>
							<br>
							<label for="email">Password</label>
							<input type="password" class="form-control" name="password" id="password" required/>
							<p><br/></p>	
							<br>
							<input type="submit" class="btn btn-success"style="background: #2691d9; width: 80%;font-size: 22px; font-weight: 700; font-family: monospace; margin-left: 35px; border-radius: 25px;" Value="Login">
							<!--If user dont have an account then he/she will click on create account button-->		
							<br>
							<br>
							<div style="text-align: center;">Not a Member? &nbsp;
								<a href="customer_registration.php?register=1" style="color: blue;">Sign Up</a>
							</div>			
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>






















