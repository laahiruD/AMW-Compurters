<?php
session_start();
include('db.php');
  $sql1 = "SELECT MAX(`orderID`) AS Max FROM `purchaseorder`";
  $query1 = mysqli_query($con,$sql1);
  $user_data1=mysqli_fetch_assoc($query1);
  $Oid = $user_data1["Max"] + 1;
  $Oid2 = $user_data1["Max"];
?>
<html>
<head>
<title>Purchase Order Form</title>
  <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="admin_pannel.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- New -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
        <li><a href="current_stock_report.php"><i class="fas fa-chart-line"></i> Current Stock Report</a></li>
        <li><a href="Issued_products.php"><i class="fas fa-share-square"></i> Issued Product</a></li>
        <li><a href="Ordered_products.php"><i class="fas fa-inbox"></i> Orderd Product</a></li>
        <li><a href="Recived_Products.php"><i class="fas fa-inbox"></i> Received Product</a></li>
        <li><a href="new_order.php"><i class="fas fa-envelope-open-text"></i> Purchase Order Form</a></li>
        <li><a href="stock_details.php"><i class="fas fa-arrow-circle-left"></i> Back</a></li>
      </ul>
    </section>

    <section class="working-panel">
      <div class="container-fluid">
        <h3 class="display-4">Purchase Order</h3>
        <hr>
        <div>
          <div style=" font-size: 17px;">
            <label style="margin-left: 250px; font-size: 17px;">Date: </label>
            <?php echo date("Y/m/d") ?>         
          </div>
          <br>
          <div style=" font-size: 17px;">
            <label style="margin-left: 250px;">Order ID: </label>
            <?php echo($Oid) ?>
          </div>
          <br> 
          <label style="margin-left: 250px;font-size: 17px;">Order Details</label>

          <div class="container">
            <br />
            <div class="table-responsive">
              <table class="table table-bordered" id="crud_table" style="width: 70%;margin-left: 200px;">
                <tr>
                  <!-- <th width="30%">Purchase ID</th> -->
                  <th width="40%">Item Name</th>
                  <th width="30%">Brand</th>
                  <th width="10%">Quantity</th>
                  <th width="5%"></th>
                </tr>
                <tr>
                 <!--  <td contenteditable="true" class="item_name"></td> -->
                  <td contenteditable="true" class="item_code"></td>
                  <td contenteditable="true" class="item_desc"></td>
                  <td contenteditable="true" class="item_price"></td>
                  <td></td>
                </tr>
              </table>
              <div align="right">
               <button type="button" name="add" id="add" class="btn btn-warning btn-xs" style="margin-right: 100px;">+</button>
              </div>
              <div align="center">
               <button type="button" name="save" id="save" class="btn btn-info" onclick="myFunction()">Save</button>
              </div>
              <br />
              <div id="inserted_item_data"></div>
            </div>
          </div>
          <a href='new_order_print.php?id=<?php echo($Oid2) ?>' style="margin-left: 525px;" class="btn btn-success">Print Order</a>
        </div>
      </div>
    </section>   
  </div>

<script>
  $(document).ready(function(){
   var count = 1;
   $('#add').click(function(){
    count = count + 1;
    var html_code = "<tr id='row"+count+"'>";
     // html_code += "<td contenteditable='true' class='item_name'></td>";
     html_code += "<td contenteditable='true' class='item_code'></td>";
     html_code += "<td contenteditable='true' class='item_desc'></td>";
     html_code += "<td contenteditable='true' class='item_price' ></td>";
     html_code += "<td><button type='button' name='remove' data-row='row"+count+"' class='btn btn-danger btn-xs remove'>-</button></td>";   
     html_code += "</tr>";  
     $('#crud_table').append(html_code);
   });
   
   $(document).on('click', '.remove', function(){
    var delete_row = $(this).data("row");
    $('#' + delete_row).remove();
   });
   
   $('#save').click(function(){
    // var item_name = [];
    var item_code = [];
    var item_desc = [];
    var item_price = [];
    // $('.item_name').each(function(){
    //  item_name.push($(this).text());
    // });
    $('.item_code').each(function(){
     item_code.push($(this).text());
    });
    $('.item_desc').each(function(){
     item_desc.push($(this).text());
    });
    $('.item_price').each(function(){
     item_price.push($(this).text());
    });
    $.ajax({
     url:"add_new_order.php",
     method:"POST",
     data:{item_code:item_code, item_desc:item_desc, item_price:item_price},
     success:function(data){
      alert(data);
      $("td[contentEditable='true']").text("");
      for(var i=2; i<= count; i++)
      {
       $('tr#'+i+'').remove();
      }
      fetch_item_data();
     }
    });
   });
   
   function fetch_item_data()
   {
    $.ajax({
     url:"fetch.php",
     method:"POST",
     success:function(data)
     {
      $('#inserted_item_data').html(data);
     }
    })
   }
   fetch_item_data();
   
  });
  </script>
</body>
</html>