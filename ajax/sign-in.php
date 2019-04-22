<?php
	error_reporting (E_ALL ^ E_NOTICE);
	require_once("../include/config.php");

	if(isset($_POST['un']) && isset($_POST['pw'])){
		
		$un = htmlentities(trim($_POST['un']));
		$pw = htmlentities(trim($_POST['pw']));
		$username = mysqli_real_escape_string($con, $un);
		$password = mysqli_real_escape_string($con, md5($pw));

		$sql = mysqli_query($con, "SELECT `admin_id`, `email` FROM `master_admin` WHERE `email` = '$username' AND `password` = '$password'");
		$row = mysqli_fetch_array($sql);
		if(is_array($row)){
			$_SESSION['user_id'] = $row['admin_id'];
			$_SESSION['user_name'] = $row['email'];
			echo true;
		}
		else{
			echo 0;
		}
	}
	else{
		echo 2;
	}
?>