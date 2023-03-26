<?php 
include "db.php";
$from = $_GET['id1'];
$to = $_GET['id2'];
$query = "SELECT WEEK(Date) AS week, SUM(Cost) AS Total FROM recived_orders WHERE date(Date) BETWEEN '$from' AND '$to' GROUP BY week ORDER BY Date ";
$result = mysqli_query($con, $query);

$query2 = "SELECT WEEK('$from') AS week";
$result2 = mysqli_query($con, $query2);
$row2 = mysqli_fetch_array($result2);
$week2 = $row2["week"];
$one = 1;

$chart_data = '';
$arr=array();
$arr2=array();
while($row = mysqli_fetch_array($result))
{
  $arr2[]= $row["Total"];
  $chart_data .= "{ week:".$row["week"]."-".$row2["week"]."+".$one.", Total:".$row["Total"]."}, ";
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.0/jspdf.umd.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="print.css" media="print">
 </head>
 <body>

  <div class = "container" style="padding-left: -0;">
    <div>
      <img src="images/New Project.jpg" style="padding-left: 120px;">
    </div>
    <div style="text-align: center; font-size: 24px;"><b><u>Cash Outflow Reoprt</u></b></div>
    <div style="padding-top: 50px; padding-left: 25px; padding-bottom: 50px;"><b>Month: </b>&nbsp;<?php echo "$from - $to"; ?>
    </div>
    <div id="chart" style="width: 1000px;"></div>  
    <div style="padding-top: 5px; padding-left: 15px;"> Monthly Expenditures: Rs. <?php echo array_sum($arr2); ?>.00</div>
    <br>
    <br>
    <div style="padding-top: 5px; padding-left: 15px;"> Approved By: </div>
    <div style="padding-top: 5px; padding-left: 15px;"> Name: </div>
    <div style="padding-top: 5px; padding-left: 15px;"> Designation: </div>
  </div>
  <div class="text-center" style="padding-bottom: 20px;">
    <a href="cash_outflow_form.php" style="padding-right: 15px;"><button class="btn btn-primary" id="print-btn">Back</button> </a>
    <button onclick="window.print();" class="btn btn-primary" id="print-btn">Print</button>
    </div>
 </body>
</html>

<script>
Morris.Bar({
 element : 'chart',
 data:[<?php echo $chart_data; ?>],
 xkey:'week',
 ykeys:['Total'],
 labels:['Income', 'Week'],
 hideHover:'auto',
 stacked:true
});
</script>


