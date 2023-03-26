<?php 
	if(isset($_POST['email']) && isset($_POST['password'])){

		function validate($data){
			$data=trim($data);
			$data=stripslashes($data);
			$data=htmlspecialchars($data);
			return $data;
		}

		$email = validate($_POST['email']);
		$pass = validate($_POST['password']);

		if(empty($email)){
			header("Location:admin_login_php.php?error=User Name Required");
			exit();
		}elseif (empty($pass)) {
			header("Location:admin_login_php.php?error=Password Required");
			exit();
		}else{
			echo "valid input";
		}
	}else{
		header("Location:admin_login_php.php");
		exit();
	}


?>