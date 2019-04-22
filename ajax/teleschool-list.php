<?php
	require_once("../include/config.php");
	if(isset($_SESSION["user_id"])){
		$temp = htmlentities(trim($_REQUEST["telecaller"]));
		$teleid = mysqli_real_escape_string($con, $temp);
		$sql = mysqli_query($con, "SELECT `school_id`, `school_name`, `school_address` FROM `master_school` WHERE `telecaller_id` = '$teleid'");
?>
		<optgroup label="Enter school name">
			<option value="0">Select School</option>
<?php		
		while($row = mysqli_fetch_array($sql)){
?>
			<option value="<?php echo $row["school_id"];?>"><?php echo strtoupper($row["school_name"]." - ".$row["school_address"]);?></option>
<?php
		}
?>
		</optgroup>
<?php		
	}
?>