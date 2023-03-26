<?php 
	include "db.php";

			$sql1 = "SELECT MAX(`OID`) AS Max FROM `recived_orders`";
  			$query1 = mysqli_query($con,$sql1);
  			$user_data1=mysqli_fetch_assoc($query1);
  			$oid = $user_data1["Max"] + 1;

  			if(isset($_POST["item_id"])){
				// $item_date = $_POST["item_date"];
				$item_id = $_POST["item_id"];
				$item_sup = $_POST["item_supplier"];
				$item_desc = $_POST["item_desc"];
				$item_price = $_POST["item_price"];
				$item_qty = $_POST["item_qty"];
				$item_cost = $_POST["item_cost"];

				$query = '';
				for($count = 0; $count<count($item_id); $count++){
				   // $item_date_clean = mysqli_real_escape_string($con, $item_date[$count]);
				   $item_id_clean = mysqli_real_escape_string($con, $item_id[$count]);
				   $item_sup_clean = mysqli_real_escape_string($con, $item_sup[$count]);
				   $item_desc_clean = mysqli_real_escape_string($con, $item_desc[$count]);
				   $item_price_clean = mysqli_real_escape_string($con, $item_price[$count]);
				   $item_qty_clean = mysqli_real_escape_string($con, $item_qty[$count]);
				   $item_cost_clean = mysqli_real_escape_string($con, $item_cost[$count]);
				   if($item_id_clean != '' && $item_sup_clean != '' && $item_desc_clean != '' && $item_price_clean != '' && $item_qty_clean != '' && $item_cost_clean != '' ){
  					$date =  date("Y/m/d");
				   $query .= '
				   INSERT INTO `recived_orders`(`OrderID`,`Date`, `Supplier`, `Product`, `Unit_price`, `Quantity`, `Cost`, `OID`)
				   VALUES("'.$item_id_clean.'","'.$date.'", "'.$item_sup_clean.'", "'.$item_desc_clean.'", "'.$item_price_clean.'", "'.$item_qty_clean.'", "'.$item_cost_clean.'", "'.$oid.'"); 
				   ';
				  	}
				  	$oid = $oid+1;
				 }
				 if($query != '')
				 {
				  if(mysqli_multi_query($con, $query))
				  {
				   echo 'Item Data Inserted';
				   // window.location.reload();
				  }
				  else
				  {
				   echo 'Error';
				  }
				 }
				 else
				 {
				  echo 'All Fields are Required';
				 }
				}
		?>

	


