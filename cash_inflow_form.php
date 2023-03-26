<?php 
  include "db.php";
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

  <div class="wrapper">
    <section class="sidebar">
      <ul class="nav-bar">
        <li><a href="cash_outflow_form.php"><i class="fas fa-file-invoice-dollar"></i> Cash Outflow</a></li>
        <li><a href="accountant_home.php"><i class="fas fa-arrow-circle-left"></i> Back</a></li>
      </ul>
    </section>

    <section class="working-panel">
      <div class="container-fluid">
        <h2 class="text-center">Cash Inflow</h2>
        <hr>

        <div>
          <row>
            <form action="cash_inflow.php" method="POST" style="padding-left: 70px;">
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
          </row>
        </div>

        <!-- Table -->
        <div class="all-order mt-5">
          <h4 style="padding-top: 25px;"></h4><hr>
        
          <div class="row" style="margin-left: 5px; background: #4353e0 ; padding-left: 40px;" >
            <div class="col-md-2" style="text-align: center;margin-left: 10px;"><b>Date</b></div>
            <div class="col-md-2" style="text-align: center; margin-left: 20px;"><b>Product Name</b></div>
            <div class="col-md-2" style="text-align: center;"><b>Unit Price</b></div>
            <div class="col-md-2" style="text-align: center;padding-left: 50px;"><b>Quantity</b></div>
            <div class="col-md-2" style="text-align: center; margin-left: 25px;" ><b>Total Amount</b></div>
          </div>
          <?php
            $sql = "SELECT salesorder.Date, salesorder.Quantity, salesorder.price, salesorder.price, product.Name FROM salesorder, product WHERE salesorder.ProductID = product.ProductID ORDER BY salesorder.Date DESC";
            $query = mysqli_query($con,$sql) or die(mysqli_error());
            if (mysqli_num_rows($query) > 0) {
              $n=0;
              while ($row=mysqli_fetch_array($query)) {
                $n++;
                $date = $row["Date"];
                $quantity = $row["Quantity"];
                $pid = $row["price"];
                $price = $row["price"];
                $name = $row["Name"];
                $amount = ($quantity * $price);

                echo 
                  '<div class="row" style="padding-left: 0px;">
                    <div class="col-md-2" style="text-align: center;">'.$date.'</div>
                    <div class="col-md-2" style="text-align: center;">'.$name.'</div>
                    <div class="col-md-2" style="text-align: center;">'.$price.'</div>
                    <div class="col-md-2" style="text-align: center;">'.$quantity.'</div>
                    <div class="col-md-2" style="text-align: center;">'.$amount.'</div>
                  </div> <hr>';
              }
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