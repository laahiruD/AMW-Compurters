<?php 
	include "db.php";	
  $oid = $_POST['oid'];
  $sql="SELECT salesorder.ProductID, product.Name, product.Brand, salesorder.Quantity, salesorder.price, salesorder.Total, salesorder.Date, salesorder.CustomerID, salesorder.OID, salesorder.name FROM salesorder, product WHERE salesorder.ProductID = product.ProductID AND OID = '$oid'";
  $result=mysqli_query($con,$sql);
  while($values=mysqli_fetch_assoc($result)){
    $cid = $values['name'];
    $date = $values['Date'];
  }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Payment Invoice</title>
	<link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="admin_pannel.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="print.css" media="print">
</head>
<body>
	<div class = "container" style="padding-left: -0; ">
    <div><img src="images/New Project.jpg" style="padding-left: 120px;"></div>
    <div style="text-align: center; font-size: 24px;"><b><u>Payment Invoice</u></b></div>
    <div >
      <div style="padding-left:170px;"><b>Order ID:</b> <?php echo $oid;  ?> </div>
      <div style="padding-left:170px;"><b>Customer:</b> <?php echo $cid;  ?> </div>
      <div style="padding-left:170px;"><b>Date:</b> <?php echo $date;  ?> </div>
      <div style="padding-left:170px;"><b>Invoive Number:</b> <?php  echo mt_rand(0,1000);?> </div>
    </div>
    <div class="container" >
    <div class="row">
      <div class="col-md-12">
        <table class="table table-bordered print">
          <thead>
            <tr>
              <th>Product ID</th>
              <th>Product Name</th>
              <th>Brand / Model</th>
              <th>Quantity</th>
              <th>Unit Price (Rs)</th>
              <th>Total Amount (Rs)</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $user_qry="SELECT salesorder.ProductID, product.Name, product.Brand, salesorder.Quantity, salesorder.price, salesorder.Total, salesorder.Date, salesorder.CustomerID, salesorder.OID FROM salesorder, product WHERE salesorder.ProductID = product.ProductID AND OID = '$oid'";
              $user_res=mysqli_query($con,$user_qry);
              while($user_data=mysqli_fetch_assoc($user_res)){
                $amount = $user_data["Quantity"] * $user_data["price"] ;
                $total = $user_data['Total'];
            ?>
            <tr>
              <td><?php echo $user_data['ProductID']; ?></td>
              <td><?php echo $user_data['Name']; ?></td>
              <td><?php echo $user_data['Brand']; ?></td>
              <td><?php echo $user_data['Quantity']; ?></td>
              <td><?php echo $user_data['price']; ?>.00</td>
              <td><?php echo $amount; ?>.00</td>
            </tr>
            <?php
            }
            ?>
            <tr>
              <td colspan="6" >
                <b style="margin-left: 470px;">Grand Total:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $total;?>.00</b>
              </td>
                
            </tr>
          </tbody>
        </table>
        <br>
        <br>
        <div style="padding-top: 5px; padding-left: 15px;"> Approved By: </div>
        <div style="padding-top: 5px; padding-left: 15px;"> Name: </div>
        <div style="padding-top: 5px; padding-left: 15px;"> Designation: </div>
        <div class="text-center" style="padding-bottom: 20px;">
          <a href="customer_movement_report.php" style="padding-right: 15px;"><button class="btn btn-primary" id="print-btn">Back</button></a>
          <button onclick="window.print();" class="btn btn-primary" id="print-btn">Print</button>
        </div>
      </div>
    </div>
  </div>
</body>
</html>