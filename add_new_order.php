<?php 
	include "db.php";

			$sql1 = "SELECT MAX(`PurchaseID`) AS Max FROM `purchaseorder`";
  			$query1 = mysqli_query($con,$sql1);
  			$user_data1=mysqli_fetch_assoc($query1);
  			$pid = $user_data1["Max"] + 1;

  			$sql2 = "SELECT MAX(`orderID`) AS Max FROM `purchaseorder`";
  			$query2 = mysqli_query($con,$sql2);
  			$user_data2=mysqli_fetch_assoc($query2);
  			$Oid = $user_data2["Max"] + 1;


  			if(isset($_POST["item_code"])){
				$item = $_POST["item_code"];
				$item_cat = $_POST["item_desc"];
				$item_qty = $_POST["item_price"];
				$query = '';
				for($count = 0; $count<count($item); $count++){
				   $item_clean = mysqli_real_escape_string($con, $item[$count]);
				   $item_cat_clean = mysqli_real_escape_string($con, $item_cat[$count]);
				   $item_qty_clean = mysqli_real_escape_string($con, $item_qty[$count]);
				   if($item_clean != '' && $item_cat_clean != '' && $item_qty_clean != ''){
				   $date =  date("Y/m/d");
				   $query .= '
				   INSERT INTO `purchaseorder`(`PurchaseID`,`orderID`, `Date`, `Item`, `supplier`, `category`, `Quantity`, `StoreKeeperID`)
				   VALUES("'.$pid.'","'.$Oid.'", "'.$date.'", "'.$item_clean.'", "2", "'.$item_cat_clean.'", "'.$item_qty_clean.'", "1"); 
				   ';
				  	}
				  	$pid = $pid+1;
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

	


