<?php 
	include "db.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>	Details</title>
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
					<span class="text-white">Details</span> &nbsp;
					<i class="fas fa-bars menu-btn text-white"></i>	
				</div>	
			</div>
		</div>
	</header>

	<div class="wrapper">
		<section class="sidebar">
			<ul class="nav-bar">
				<li><a href="products.php"><i class="fas fa-arrow-circle-left"></i> Back</a></li>
			</ul>
		</section>

		<section class="working-panel">
			<div class="container-fluid">
				<h2 style="margin-top: 10px;"> Product Details</h2>
				<div class="contactForm" style="width: 500px;padding-top:30px; margin-left: 250px;">   
					<?php
						$oid = $_GET['id'];
						$sql = "SELECT * FROM `product` WHERE ProductID='$oid'";
						$query = mysqli_query($con,$sql);

						if (mysqli_num_rows($query) > 0) {
							while ($row=mysqli_fetch_array($query)) {
								$productName = $row["Name"];
								$price = $row["price"];
								$description = $row["Description"];
								$imageName = $row["Image1"];
								$brand = $row["Brand"];

							}
								echo '
										<div class="form-group">
											<input type="text" name="price" class="form-control" placeholder="'.$productName.'">
										</div>
										<div class="form-group">
											<input type="text" name="price" class="form-control" placeholder="'.$price.'.00">
										</div>
										<img src="images/'.$imageName.'" style="width:300px; height:300px;"/>
										<br>
										<br>
										<div class="form-group">
											<input type="text" name="price" class="form-control" placeholder="'.$brand.'">
										</div>
										<div class="form-group">
											<textarea name="description" class="form-control" rows="6" cols="5" placeholder="'.$description.'"></textarea>
										</div>
									</form>
									
								';
						?>				
					<?php
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