<?php 
  include "db.php";
?>

<!DOCTYPE html>
<html>
<head>
  <title>Customer Movement Report</title>
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
    <div style="text-align: center; font-size: 24px;"><b><u>Customer Movement Report</u></b></div>
    <div style="padding-top: 50px; padding-left: 160px; padding-bottom: 50px;"><b>Date: </b></div>
    <div class="container">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-bordered print">
          <thead>
            <tr>
              <th>Customer ID</th>
              <th>Name</th>
              <th>Number of Orders</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $a = $_GET['id1'];
              $b = $_GET['id2'];
              $user_qry="SELECT DISTINCT salesorder.CustomerID, customer.first_name, customer.last_name, COUNT(OID) FROM salesorder, customer WHERE Date BETWEEN ' $a' AND '$b' AND salesorder.CustomerID = customer.CustomerID GROUP BY salesorder.CustomerID ORDER BY COUNT(OID) DESC LIMIT 10";
              
              $user_res=mysqli_query($con,$user_qry);
              while($user_data=mysqli_fetch_assoc($user_res)){
                $f_name = $user_data["first_name"];
                $l_name = $user_data["last_name"]; 
                $name = $f_name . ' '.$l_name;
            ?>
            <tr>
              <td><?php echo$user_data['CustomerID']; ?></td>
              <td><?php echo $name; ?></td>
              <td><?php echo $user_data['COUNT(OID)']; ?></td>
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
          <a href="payment_invoice_form.html" style="padding-right: 15px;"><button class="btn btn-primary" id="print-btn">Back</button></a>
          <button onclick="window.print();" class="btn btn-primary" id="print-btn">Print</button>
        </div>
      </div>
    </div>
  </div>
<body>
</html>