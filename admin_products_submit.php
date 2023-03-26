<?php 
	include "db.php";
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Complete</title>
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

	<div class="row" style="background: radial-gradient(#94d1d1,#cdf7f7); margin-top: 70px;">
		<div>
			<?php
				if(isset($_POST['submit'])){
					if(!empty($_POST['name'])  && !empty($_POST['price']) && !empty($_POST['image']) && !empty($_POST['imagename']) && !empty($_POST['description']) && !empty($_POST['qty']) && !empty($_POST['id'])){
						$name=$_POST['name'];
						$price=$_POST['price'];
						$image=$_POST['image'];
						$imagename=$_POST['imagename'];
						$description=$_POST['description'];
						$qty=$_POST['qty'];
						$id=$_POST['id'];

						$sql = "UPDATE `product` SET `AvailableQuantity`= '$qty',`Description`='$description',`Name`='$name',`price`='$price',`Image`='$image',`Image1`='$imagename' WHERE ProductID ='$id'";
						$query = mysqli_query($con,$sql);

						if ($query) {
							echo "<div>
									<h2>Completed!</h2>
								</div>";
						}else{
							echo "Something went wrong!";
						}

					}
				}
			?>
		</div> 
	</div>
	<div style="margin-top: 50px; margin-left: 580px;">
		<button onclick="window.location.href='admin_products_new.php'" style="width: 200px; height: 50px; font-weight: 750; border-radius: 20px; background: #5787d4;" >Back
		</button>
</body>
</html>


