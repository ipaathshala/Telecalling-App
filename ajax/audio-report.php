<?php
	require_once("../include/config.php");
	error_reporting (E_ALL ^ E_NOTICE);

	if(isset($_SESSION["user_id"])){
		
		if(isset($_REQUEST["telecall_id"]) && isset($_REQUEST["school_id"])){

			$temp1 = htmlentities(trim($_REQUEST["telecall_id"]));
			$temp2 = htmlentities(trim($_REQUEST["school_id"]));
			$temp3 = htmlentities(trim($_REQUEST["from_date"]));
			$temp4 = htmlentities(trim($_REQUEST["to_date"]));

			$telecaller = mysqli_real_escape_string($con, $temp1);
			$school = mysqli_real_escape_string($con, $temp2);
			$from = mysqli_real_escape_string($con, date("d-m-Y", strtotime($temp3)));
			$to = mysqli_real_escape_string($con, date("d-m-Y", strtotime($temp4)));

			$sql = mysqli_query($con, "SELECT master_student.std_name, master_student.std_fname, master_student.std_lname, master_school.school_name, lead_feedabck.last_call_date, lead_feedabck.call_back_date, lead_feedabck.call_back_time, lead_feedabck.add_to_list, lead_feedabck.call_file FROM master_student LEFT JOIN master_school ON master_student.school_id = master_school.school_id LEFT JOIN lead_feedabck ON lead_feedabck.lead_id = master_student.student_id WHERE lead_feedabck.telecaller_id = '$telecaller' AND master_student.school_id = '$school' AND lead_feedabck.last_call_date BETWEEN '$from' AND '$to'");
			$x = 1;
			while($row = mysqli_fetch_array($sql)){
?>			
				<tr>
					<td><?php echo $x++;?></td>
					<td><?php echo ucwords($row["std_name"]." ".$row["std_fname"]." ".$row["std_lname"]);?></td>
					<td><?php echo $row["last_call_date"];?></td>
					<td><?php echo $row["call_back_date"];?></td>
					<td><?php echo $row["call_back_time"];?></td>
					<td><?php echo ucfirst($row["add_to_list"]);?></td>
					<td><audio controls><source src="<?php echo $row['call_file'];?>" type="audio/ogg"><source src="<?php echo $row['call_file'];?>" type="audio/mpeg">Your browser does not support the audio element.</audio></td>
				</tr>
<?php				
			}
		}
	}
?>