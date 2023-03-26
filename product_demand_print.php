<?php
include 'db.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>PHP Print</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="print.css" media="print">
  <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="admin_pannel.css">
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['category', 'count'],
          <?php
            $a = $_GET['id1'];
            $b = $_GET['id2'];
            $sql = "SELECT COUNT(salesorder.ProductID) AS count,product.category AS category FROM salesorder,product WHERE Date BETWEEN '$a' AND '$b' AND salesorder.ProductID = product.ProductID GROUP BY product.category";
      $result = mysqli_query($con, $sql);

      while($value = mysqli_fetch_assoc($result)){
        echo "['".$value['category']."',".$value['count']."],";
      }
          ?>
        ]);

        var options = {
          title: ''
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
</head>
<body>

<div class="container">
  <div><img src="images/New Project.jpg" style="padding-left: 120px;"></div>
  <div style="padding-top: 50px; padding-left: 160px; padding-bottom: 50px;"><b>Date: </b></div>
  <div class="container" style="float: right; padding-left: 100px;">
    <h2 style="padding-left: 250px;">Product Demand Report</h2> 
    <div id="piechart" style="width: 900px; height: 500px; margin-left: 100px;"></div>
  </div>
  <br>
        <br>
        <div style="padding-top: 5px; padding-left: 250px;"> Approved By: </div>
        <div style="padding-top: 5px; padding-left: 250px;"> Name: </div>
        <div style="padding-top: 5px; padding-left: 250px;"> Designation: </div>
        <div class="text-center" style="padding-bottom: 20px;">
          <a href="product_demand.php" style="padding-right: 15px;"><button class="btn btn-primary" id="print-btn">Back</button></a>
          <button onclick="window.print();" class="btn btn-primary" id="print-btn">Print</button>
        </div> 
</div>
</body>
</html>
