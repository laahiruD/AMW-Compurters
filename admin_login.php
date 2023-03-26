<?php
require "db.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<link rel="stylesheet" type="text/css" href="admin_style.css">
</head>
<body>
	<form  method="post" >
		<h2>Login</h2>
		<?php if(isset($_GET['error'])){ ?>
			<p class="error"> <?php echo $_GET['error'];?></p>

		<?php } ?>
		<label>Email</label>
		<input type="Email" name="email" placeholder="Email Address"><br>
		<label>Password</label>
		<input type="Password" name="password" placeholder="Password"><br>
		<button type="submit" id="asd" name="submit" onclick="myFunction()">Login</button>
		<a href="index.php"> Back To Home</a>
		
	</form>
	<?php 
	if (isset($_POST["submit"])) {
		$email = $_POST["email"];
		$pass = $_POST["password"];

		$sql = mysqli_query($con,"SELECT * FROM `admin` WHERE `email`='".$email."' AND `password`='".$pass."' ");

		$rw=mysqli_fetch_array($sql);

		if($rw>0){
			$type = $rw["type"];
			if($type == "Clerk"){
				header("Location: clerk_Home.php"); 
  				exit();
			}else if($type == "StoreKeeper"){
				header("Location: StoreKeeper_Home.php"); 
  				exit();
			}else if($type == "DeliveryPerson"){
				header("Location: delivery_person_home.php"); 
  				exit();
			}else if($type == "Accountant"){
				header("Location: accountant_home.php"); 
  				exit();
			}
			
		}
		else{
			echo "<script> alert('Incorrect')</script>";
		}
	}
?>
	<script>
		function myFunction() {
  		document.getElementById("asd").reset();
		}
	</script>
</body>
</html>


