<?php
	require_once("../include/config.php");

	if(isset($_POST['un']) && isset($_POST['pw'])){

		$un = htmlentities(trim($_POST['un']));
		$pw = htmlentities(trim($_POST['pw']));

		$username = mysqli_real_escape_string($con, $un);
		$password = mysqli_real_escape_string($con, md5($pw));

		$duplicate = mysqli_query($con, "SELECT `admin_id` FROM `master_admin` WHERE `email` = '$username'");
		$row = mysqli_fetch_array($duplicate);
		if($row>0){
			echo 2;
		}
		else{
			$sql = mysqli_query($con, "INSERT INTO `master_admin` (`email`, `password`) VALUES ('$username','$password')");
			echo 1;
		}
	}
	else{
		echo 0;
	}
	mysqli_close($con);
?>
