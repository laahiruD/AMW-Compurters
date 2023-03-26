<?php 
	include "db.php";
	 $oid = $_POST['search_box'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Products</title>
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
				<li><a href="customer_details.php"><i class="fas fa-users"></i> Customers</a></li>
				<li><a href="sales_order.php"><i class="fas fa-clipboard-list"></i> Sales Order</a></li>
				<li><a href="admin_products_new.php"><i class="fa fa-cubes"></i> Products</a></li>
				<li><a href="Reports.php"><i class="fas fa-chart-line"></i> Reports</a></li>
				<li><a href="payment_invoice_form.html"><i class="fas fa-file-invoice-dollar"></i> Payment Invoice</a></li>
				<li><a href="clerk_Home.php"><i class="fas fa-arrow-circle-left"></i> Back</a></li>

			</ul>
		</section>

		<section class="working-panel">
			<div class="container-fluid">
				<h1 class="display-4">Make Changes</h1>
				<hr>
			</div>

			<div class="contactForm" style="width: 500px;padding-top:30px; margin-left: 250px;">   
				<?php
					$sql = "SELECT * FROM `product` WHERE ProductID='$oid'";
					$query = mysqli_query($con,$sql);

					if (mysqli_num_rows($query) > 0) {
						while ($row=mysqli_fetch_array($query)) {
							$product_id = $row["ProductID"];
							$productName = $row["Name"];
							$price = $row["price"];
							$description = $row["Description"];
							$AvailableQuantity = $row['AvailableQuantity'];
							$image = $row["Image"];
							$imageName = $row["Image1"];
							$status = $row["status"];

						}
						if($status == False){
							echo "<script type='text/javascript'>
									alert('Not Available!');
									window.location.href='admin_products_new.php';
									</script>";
						}else{
							echo "$productName";
							echo '<form action="admin_products_submit.php" method="POST">
									<div class="form-group">
										<input type="text" name="name" class="form-control" placeholder="Name" required>
									</div>
									'.$price.'.00
									<div class="form-group">
										<input type="text" name="price" class="form-control" placeholder="Price" required>
									</div>
									<img src="images/'.$imageName.'" style="width:300px; height:300px;"/>
									<div class="form-group" >
										<input type="file" name="image" class="form-control" placeholder="Image" required>
									</div>
									'.$imageName.'
									<div class="form-group" >
										<input type="text" name="imagename" class="form-control" placeholder="Image Name" required>
									</div>
									'.$description.'
									<div class="form-group">
										<textarea name="description" class="form-control" rows="3" cols="5" placeholder="Features"></textarea>
									</div>
									'.$AvailableQuantity.'
									<div class="form-group">
										<input type="text" name="qty" class="form-control" placeholder="Available Quantity" required>
									</div>
									<br>
									<input type="hidden" name="id" class="form-control" value='.$product_id.'>
									<div class="form-group" style="width:90px; margin-left:220px;">
										<input type="submit" name="submit" value="Change" class="btn btn-primary btn-block" style="margin-left: 0;">
									</div>
								</form>
								<form action="delete_item.php" method="POST">
									<input type="hidden" name="id" class="form-control" value='.$product_id.'>
									<div class="form-group" style="width:90px; margin-left:220px;">
										<input type="submit" name="submit" value="Delete" class="btn btn-danger btn-block"" style="margin-left: 0;margin-bottom:20px;">
									</div>
								</form>
							';
						}
					?>				
				<?php
					}						
				?>
				
				<!-- <button class="btn btn-danger" style="margin-bottom: 15px;margin-left: 220px;"> <i class="far fa-trash-alt" ></i> Delete </button> -->
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
