<?php 
	include "db.php";
	$sql1 = "SELECT Max(`ProductID`) AS Max FROM `product`";
	$query1 = mysqli_query($con,$sql1);
	$user_data1=mysqli_fetch_assoc($query1);
	$Oid = $user_data1["Max"] + 1;
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add New Product</title>
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
		</div>
	</header>

	<div class="wrapper">
		<section class="sidebar">
			<ul class="nav-bar">
				<li><a href="admin_products.html"><i class="fas fa-arrow-circle-left"></i> Back</a></li>
			</ul>
		</section>

		<section class="working-panel">
			<div class="container-fluid">
				<h1 class="display-4">Add New Product</h1>
				<hr>
			</div>

			<div class="contactForm" style="width: 500px;padding-top:30px; margin-left: 250px;">   
				<form action="add_products_submit.php" method="POST">
					<div class="form-group">
						<input type="text" name="id" class="form-control" value="<?php echo $Oid ?>">
					</div>
					<div class="form-group">
						<input type="text" name="name" class="form-control" placeholder="Name" required>
					</div>

					<div class="form-group">
						<input type="text" name="price" class="form-control" placeholder="Price" required>
					</div>

					<div class="form-group">
						<input type="text" name="brand" class="form-control" placeholder="Brand" required>
					</div>

					<div class="form-group">
						<input type="text" name="category" class="form-control" placeholder="Category" required>
					</div>

					<div class="form-group" >
						<input type="file" name="image" class="form-control" placeholder="Image" required>
					</div>

					<div class="form-group">
						<input type="text" name="image1" class="form-control" placeholder="Image Name" required>
					</div>

					<div class="form-group">
						<textarea name="description" class="form-control" rows="3" cols="5" placeholder="Features"></textarea>
					</div>

					<div class="form-group">
						<input type="text" name="qty" class="form-control" placeholder="Available Quantity" required>
					</div>

					<div class="form-group">
						<input type="hidden" name="pid" class="form-control" value="<?php echo $Oid ?>" >
					</div>

					<div class="form-group">
						<input type="hidden" name="sk" class="form-control" value="1">
					</div>

					<div class="form-group">
						<input type="hidden" name="status" class="form-control" value="TRUE">
					</div>
					<br>
					<div class="form-group" style="width:90px; margin-left:220px;">
						<input type="submit" name="submit" value="ADD" class="btn btn-primary btn-block" style="margin-left: 0;">
					</div>
				</form>
		</section> 			
	</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>