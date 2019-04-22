<?php
	require_once("../include/config.php");
	error_reporting (E_ALL ^ E_NOTICE);

	if(isset($_SESSION["user_id"])){
		$sql = mysqli_query($con,"SELECT * FROM `tele_caller_operator`");
?>
		<optgroup label="Enter telecaller name">
			<option value="0">Select Telecaller</option>
<?php				
		while($row = mysqli_fetch_array($sql)){
?>
		
			<option value="<?php echo $row["tc_id"];?>"><?php echo ucwords($row["tc_fn"]." ".$row["tc_ln"])." - ".$row["tc_un"];?></option>
		
<?php			
		}
?>
		</optgroup>
<?php
	}
?>