<?php 
	include "db.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Received Product</title>
	<link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="admin_pannel.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>


	
	<!-- Header Section -->
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
        <li><a href="Recived_Products.php"><i class="fas fa-arrow-circle-left"></i> Back</a></li>
      </ul>
    </section>

    <section class="working-panel">
      <div class="container-fluid">
        <h3 class="display-4">Received Order</h3>
        <hr>
        <div>
          <div style=" font-size: 17px;">
            <label style="margin-left: 250px; font-size: 17px;">Date: </label>
            <?php echo date("Y/m/d") ?>         
          </div>
          <br>
          <!-- <div style=" font-size: 17px;">
            <label style="margin-left: 250px;">Order ID: </label>
            <?php echo($Oid) ?>
          </div>
          <br> --> 
          <label style="margin-left: 250px;font-size: 17px;"> Received Order Details :</label>

          <div class="container">
            <br />
            <div class="table-responsive">
              <table class="table table-bordered" id="crud_table" style="width: 80%;margin-left: 100px;">
                <tr>
                  <!-- <th width="15%">Date</th> -->
                  <th width="10%">Order ID</th>
                  <th width="20%">Supplier</th>
                  <th width="25%">Product</th>
                  <th width="15%">Unit Price</th>
                  <th width="10%">Quantity</th>
                  <th width="15%">Total Cost</th>
                  <th width="5%"></th>
                </tr>
                <tr>
                  <!-- <td contenteditable="true" class="item_date"></td> -->
                  <td contenteditable="true" class="item_id"></td>
                  <td contenteditable="true" class="item_supplier"></td>
                  <td contenteditable="true" class="item_desc"></td>
                  <td contenteditable="true" class="item_price"></td>
                  <td contenteditable="true" class="item_qty"></td>
                  <td contenteditable="true" class="item_cost"></td>
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
         <!--  <a href='new_order_print.php?id=<?php echo($Oid2) ?>' style="margin-left: 525px;" class="btn btn-success">Print Order</a> -->
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
     html_code += "<td contenteditable='true' class='item_id'></td>";
     html_code += "<td contenteditable='true' class='item_supplier'></td>";
     html_code += "<td contenteditable='true' class='item_desc'></td>";
     html_code += "<td contenteditable='true' class='item_price' ></td>";
     html_code += "<td contenteditable='true' class='item_qty' ></td>";
     html_code += "<td contenteditable='true' class='item_cost' ></td>";
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
    var item_id = [];
    var item_supplier = [];
    var item_desc = [];
    var item_price = [];
    var item_qty = [];
    var item_cost = [];
    // $('.item_name').each(function(){
    //  item_name.push($(this).text());
    // });
    $('.item_id').each(function(){
     item_id.push($(this).text());
    });
    $('.item_supplier').each(function(){
     item_supplier.push($(this).text());
    });
    $('.item_desc').each(function(){
     item_desc.push($(this).text());
    });
    $('.item_price').each(function(){
     item_price.push($(this).text());
    });
    $('.item_qty').each(function(){
     item_qty.push($(this).text());
    });
    $('.item_cost').each(function(){
     item_cost.push($(this).text());
    });
    $.ajax({
     url:"new_recived_order_add.php",
     method:"POST",
      data:{item_id:item_id,item_supplier:item_supplier,item_desc:item_desc, item_price:item_price, item_qty:item_qty, item_cost:item_cost},
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
<!-- <script>
  $(document).ready(function(){
   var count = 1;
   $('#add').click(function(){
    count = count + 1;
    var html_code = "<tr id='row"+count+"'>";
     // html_code += "<td contenteditable='true' class='item_date'></td>";
     html_code += "<td contenteditable='true' class='item_id'></td>";
     html_code += "<td contenteditable='true' class='item_supplier'></td>";
     html_code += "<td contenteditable='true' class='item_desc'></td>";
     html_code += "<td contenteditable='true' class='item_price' ></td>";
     html_code += "<td contenteditable='true' class='item_qty' ></td>";
     html_code += "<td contenteditable='true' class='item_cost' ></td>";
     html_code += "<td><button type='button' name='remove' data-row='row"+count+"' class='btn btn-danger btn-xs remove'>-</button></td>";   
     html_code += "</tr>";  
     $('#crud_table').append(html_code);
   });
   
   $(document).on('click', '.remove', function(){
    var delete_row = $(this).data("row");
    $('#' + delete_row).remove();
   });
   
   $('#save').click(function(){
    // var item_date = [];
    var item_id = [];
    var item_supplier = [];
    var item_desc = [];
    var item_price = [];
    var item_qty = [];
    var item_cost = [];
    // $('.item_date').each(function(){
    //  item_date.push($(this).text());
    // });
    $('.item_id').each(function(){
     item_date.push($(this).text());
    });
    $('.item_supplier').each(function(){
     item_supplier.push($(this).text());
    });
    $('.item_desc').each(function(){
     item_desc.push($(this).text());
    });
    $('.item_price').each(function(){
     item_price.push($(this).text());
    });
    $('.item_qty').each(function(){
     item_qty.push($(this).text());
    });
    $('.item_cost').each(function(){
     item_cost.push($(this).text());
    });
    $.ajax({
     url:"new_recived_order_add.php",
     method:"POST",
     data:{item_id:item_id,item_supplier:item_supplier,item_desc:item_desc, item_price:item_price, item_qty:item_qty, item_cost:item_cost},
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
  </script> -->

</body>
</html>