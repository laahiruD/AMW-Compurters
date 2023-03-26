<?php 
include "db.php";
$from = $_POST['from'];
$to = $_POST['to'];
$query = "SELECT COUNT(DISTINCT(OID)) AS count, WEEK(Date) AS week FROM salesorder WHERE date(Date) BETWEEN '$from' AND '$to' GROUP BY week ORDER BY Date";
$result = mysqli_query($con, $query);
$chart_data = '';
while($row = mysqli_fetch_array($result))
{
 $chart_data .= "{ Week:' ', Orders:".$row["count"]."}, ";
}
$chart_data = substr($chart_data, 0, -2);
?>

<!DOCTYPE html>
<html>
 <head>
  <title>Graphs</title>
  
  <!-- Bootstrap CDN -->
  <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="admin_pannel.css">
  <script src="https://code.jquery.com/jquery-3.4.0.js"></script>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

  
 </head>
 <body>
  <header>
    <div class="container-fluid">
      <div class="header-content">
        <div class="side-head">
          <span class="text-white">Admin Panel</span> &nbsp;
          <i class="fas fa-bars menu-btn text-white"></i> 
        </div>  
      </div>
    </div>
  </header>
  <div class="container" style="float: right; padding-left: 100px;">
   <h2 class="text-center">Monthly Sales Report</h2>
   <h3 class="text-center">Orders</h3>   
   <br /><br />
   <div id="chart"></div>
  </div>
  <div>
    <section class="sidebar">
      <ul class="nav-bar">
        <li><a href="Income_chart_form.html"><i class="fas fa-users"></i> Monthly Income</a></li>
        <li><a href="Reports.php"><i class="fas fa-arrow-circle-left"></i> Back</a></li>
        <li>
        <form action="sales_order_report.php" method="POST" style="padding-left: 70px;">
          <input type="hidden" name="from" class="search-box"  value = <?php  echo $from; ?> >
          <input type="hidden" name="to" class="search-box" value = <?php  echo $to; ?>>
          <button> <i class="fas fa-print"></i>Print Report</button>
        </form>
      </li>
      </ul>
    </section>
  </div>

  <div class = "container">
    
</div>

 </body>
</html>

<script>
Morris.Bar({
 element : 'chart',
 data:[<?php echo $chart_data; ?>],
 xkey:'Week',
 ykeys:['Orders'],
 labels:['Orders', 'Week'],
 hideHover:'auto',
 stacked:true
});
</script>