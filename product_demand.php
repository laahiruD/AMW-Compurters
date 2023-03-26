<?php
include "db.php";
?>

<html>
  <head>
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
          	$sql = "SELECT COUNT(salesorder.ProductID) AS count,product.category AS category FROM salesorder,product WHERE salesorder.ProductID = product.ProductID GROUP BY product.category";
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
          <li><a href="Income_chart_form.html"><i class="fas fa-chart-line"></i> Monthly Sales Report</a></li>
          <li><a href="customer_movement_report.php"><i class="fas fa-chart-line"></i>  Customer Movement </a></li>
          <li><a href="Reports.php"><i class="fas fa-arrow-circle-left"></i> Back</a></li>
        </ul>
         <a><button style="margin-left: 55px;"> <i class="fas fa-print"></i>Print Report</button></a>
      </section>

      <section class="working-panel">
        <div class="container-fluid">
          <h2 style="padding-left: 250px; padding-top: 50px;">Product Demand Report</h2> 
          <div style="margin-bottom: 70px;">
            <form action="product_demand_new.php" method="POST" style="padding-left: 70px;">
              <br>
              <label>From</label><br>
              <input type="date" name="from" class="search-box" placeholder="yyyy-mm-dd" >
              <br>
              <br>
              <br>
              <label>To</label><br>
              <input type="date" name="to" class="search-box" placeholder="yyyy-mm-dd">
              <button class="search_btn btn btn-success"> <i class="fas fa-search"></i></button>
            </form>
          </div> 
          <div id="piechart" style="width: 900px; height: 500px; margin-left: 100px;"></div>
        </div>
      </section>
    </div>
  </body>
</html>
