<?php
	require_once("../include/config.php");
	error_reporting (E_ALL ^ E_NOTICE);

	if(isset($_SESSION["user_id"])){
		
		if(!empty($_FILES["file"]["tmp_name"])){

			$filename = $_FILES["file"]["tmp_name"];

			if($_FILES["file"]["size"] > 0){
				
				$file = fopen($filename, "r");
				while(($getData = fgetcsv($file, 10000, ",")) !== FALSE){

					$check = mysqli_query($con, "SELECT `school_id` FROM `master_school` WHERE `school_name` = '$getData[0]'");
					$row = mysqli_fetch_array($check);
					if(isset($row)){
						echo 2;
						exit();
					}
					$sql = mysqli_query($con, "INSERT INTO `master_school` (`school_name`, `school_address`) VALUES ('$getData[0]','$getData[1]')");
				}
				echo 1;
				fclose($file);
			}
		}
	}
	else{
		echo 0;
	}
?>