<?php
if (isset($_GET["register"])) {
	
	?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Sign Up</title>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<script src="js/jquery2.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="main.js"></script>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
<body>
<div class="wait overlay">
	<div class="loader"></div>
</div>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">	
			<div class="navbar-header">
			</div>
			<ul class="nav navbar-nav">
				<li><a href="index.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
				<li><a href="index.php"><span class="glyphicon glyphicon-modal-window"></span>Product</a></li>
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
			<div class="col-md-2"></div>
			<div class="col-md-8" style="width: 50%; margin-left: 120px;">
				<div class="panel panel-primary">
					<div class="panel-heading">Customer SignUp Form</div>
					<div class="panel-body">
					
					<form id="signup_form" onsubmit="return false">
						<div class="row" style="padding-top: 15px;">
							<div class="col-md-6">
								<label for="f_name">First Name</label>
								<input type="text" id="f_name" name="f_name" class="form-control">
							</div>
						</div>
						<div class="row" style="padding-top: 15px;">
							<div class="col-md-6">
								<label for="f_name">Last Name</label>
								<input type="text" id="l_name" name="l_name"class="form-control">
							</div>
						</div>
						<div class="row" style="padding-top: 15px;">
							<div class="col-md-6">
								<label for="nic">NIC Number</label>
								<input type="text" id="mobile" name="nic" maxlength="12" class="form-control">
							</div>
						</div>
						<div class="row" style="padding-top: 15px;">
							<div class="col-md-6">
								<label for="email">Email</label>
								<input type="email" id="email1" name="email"class="form-control">
							</div>
						</div>
						<div class="row" style="padding-top: 15px;">
							<div class="col-md-6">
								<label for="password">Password</label>
								<input type="password" id="password" name="password"class="form-control">
							</div>
						</div>
						<div class="row" style="padding-top: 15px;">
							<div class="col-md-6">
								<label for="repassword">Re-enter Password</label>
								<input type="password" id="repassword" name="repassword"class="form-control">
							</div>
						</div>
						<div class="row" style="padding-top: 15px;">
							<div class="col-md-6">
								<label for="mobile">Mobile</label>
								<input type="tel" id="mobile" name="mobile" maxlength="10" class="form-control">
							</div>
						</div>
						<div class="row" style="padding-top: 15px;">
							<div class="col-md-6">
								<label for="address1">Street No</label>
								<input type="text" id="address1" name="address1"class="form-control">
							</div>
						</div>
						<div class="row" style="padding-top: 15px;">
							<div class="col-md-6">
								<label for="address2">Address Line 2</label>
								<input type="text" id="address2" name="address2"class="form-control">
							</div>
						</div>
						<div class="row" style="padding-top: 15px;">
							<div class="col-md-6">
								<label for="postal_code">Postal Code</label>
								<input type="text" id="postal" name="postal"class="form-control">
							</div>
						</div>
						<p><br/></p>
						<div class="row" style="padding-top: 15px;">
							<div class="col-md-12">
								<input style="width:40%;margin-left: 200px;" value="Sign Up" type="submit" name="signup_button"class="btn btn-success btn-lg">
							</div>
						</div>
						
					</div>
					</form>
					<div class="panel-footer"></div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
</body>
</html>
	<?php
}



?>






















