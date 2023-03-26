<?php 
  include "db.php";
?>

<!DOCTYPE html>
<html>
<head>
  <title>Purchase Order Details</title>
  <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="admin_pannel.css">
  <script src="https://code.jquery.com/jquery-3.4.0.js"></script>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.0/jspdf.umd.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="print.css" media="print">
 </head>
<body>
  <div class = "container" style="padding-left: -0;">
    <div><img src="images/New Project.jpg" style="padding-left: 120px;"></div>
    <div style="text-align: center; font-size: 24px;"><b><u>Purchase Order Report</u></b></div>
    <div style="padding-top: 50px; padding-left: 160px; padding-bottom: 50px;"><b>Date: </b></div>
    <div class="container">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-bordered print">
          <thead>
            <tr>
              <th>Order ID</th>
              <th>Date</th>
              <th>Item</th>
              <th>Quantity</th>
              <th>Supplier</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $user_qry="SELECT purchaseorder.PurchaseID, purchaseorder.Date, purchaseorder.Item, purchaseorder.Quantity, supplier.Name FROM purchaseorder, supplier WHERE purchaseorder.supplier = supplier.SupplierID";
              $user_res=mysqli_query($con,$user_qry);
              while($user_data=mysqli_fetch_assoc($user_res)){
            ?>
            <tr>
              <td><?php echo$user_data["PurchaseID"]; ?></td>
              <td><?php echo $user_data["Date"]; ?></td>
              <td><?php echo $user_data['Item']; ?></td>
              <td><?php echo $user_data['Quantity']; ?></td>
              <td><?php echo $user_data['Name']; ?></td>
            </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
        <br>
        <br>
        <div style="padding-top: 5px; padding-left: 15px;"> Approved By: </div>
        <div style="padding-top: 5px; padding-left: 15px;"> Name: </div>
        <div style="padding-top: 5px; padding-left: 15px;"> Designation: </div>
        <div class="text-center" style="padding-bottom: 20px;">
          <a href="Purchased_order_form.php" style="padding-right: 15px;"><button class="btn btn-primary" id="print-btn">Back</button></a>
          <button onclick="window.print();" class="btn btn-primary" id="print-btn">Print</button>
        </div>
      </div>
    </div>
  </div>
<body>
</html>