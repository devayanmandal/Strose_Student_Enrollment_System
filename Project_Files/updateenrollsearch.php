<?php session_start(); ?>
<?php 
include('connect.php');
	$enrollmentid= $_GET["enrollmentid"];
	$studentid= $_GET["studentid"];
	$classid= $_GET["classid"];
	$returnValue= false;
	
	if(isset($enrollmentid) && ! empty($enrollmentid))
	{
		$sql_command= "SELECT * FROM ENROLLMENTS WHERE ENROLLMENTID = '" .$enrollmentid. "';";
		$result= $conn->query($sql_command);
	}
	else if((isset($studentid) && ! empty($studentid)) && (isset($classid) && ! empty($classid)))
	{
		$sql_command= "SELECT * FROM ENROLLMENTS WHERE STUDENTID = '" .$studentid. "' AND CLASSID = '" .$classid. "';";
		$result= $conn->query($sql_command);
	}	
	
	if(mysqli_num_rows($result) > 0)
	{		
		while($row= mysqli_fetch_array($result))
		{
			$returnValue= "<table id='t01' class='info-table'><thead><tr><th colspan='2'>Information</th>";
		/*	<th>Student ID</th><th>Class ID</th><th>Faculty ID</th><th>Class Code</th><th>Section</th><th>Status</th> */
			$returnValue.="</tr></thead><tbody>";
			$returnValue .= "<tr><td>Enrollment ID</td>";
			$returnValue .= "<td>" . "<input style= 'font-size:16pt; font-family:Century Gothic; background:#ccc; color:white;' type= 'text' name= 'enrollmentid2' id= 'enrollmentid2' value= '" . $row['ENROLLMENTID'] . "' readonly> </td>";
			$returnValue .= "</tr><tr><td>Student ID</td>";
			$returnValue .= "<td>" . "<input style= 'font-size:16pt; font-family:Century Gothic; background:#ccc; color:white;' type= 'text' name= 'studentid2' id= 'studentid2' value= '" . $row['STUDENTID'] . "' readonly> </td>";
			$returnValue .= "</tr><tr><td>Class ID</td>";
			$returnValue .= "<td>" . "<input style= 'font-size:16pt; font-family:Century Gothic; background:#ccc; color:white;' type= 'text' name= 'classid2' id= 'classid2' value= '" . $row['CLASSID'] . "' readonly> </td>";
			$returnValue .= "</tr><tr><td>Faculty ID</td>";
			$returnValue .= "<td>" . "<input style= 'font-size:16pt; font-family:Century Gothic; background:#ccc; color:white;' type= 'text' name= 'facultyid' id= 'facultyid' value= '" . $row['FACULTYID'] . "' readonly> </td>";
			$returnValue .= "</tr><tr><td>Class Code</td>";
			$returnValue .= "<td>" . "<input style= 'font-size:16pt; font-family:Century Gothic; background:#ccc; color:white;' type= 'text' name= 'classcode' id= 'classcode' value= '" . $row['CLASSCODE'] . "' readonly> </td>";
			$returnValue .= "</tr><tr><td>Section</td>";
			$returnValue .= "<td>" . "<input style= 'font-size:16pt; font-family:Century Gothic; background:#ccc; color:white;' type= 'text' name= 'section' id= 'section' value= '" . $row['SEC'] . "' readonly> </td>";
			$returnValue .= "</tr><tr><td>Status</td>";
			$_SESSION['prevstatus']= $row['STATUS'];
			if($row['STATUS'] == "Enrolled")
			{
				$returnValue .= "<td>".
				"<select style= 'font-size:16pt;' name= 'status' id= 'status'>".
					"<option value= 'Enrolled' selected>Enrolled</option>".
					"<option value= 'In Progress'>In Progress</option>".
					"<option value= 'Completed'>Completed</option>".
					"<option value= 'Dropped'>Dropped</option>".
					"<option value= 'Canceled'>Canceled</option>".
				"</select>".
				"</td>";
			}
			else if($row['STATUS'] == "In Progress")
			{
				$returnValue .= "<td>".
				"<select style= 'font-size:16pt;' name= 'status' id= 'status'>".
					"<option value= 'Enrolled'>Enrolled</option>".
					"<option value= 'In Progress' selected>In Progress</option>".
					"<option value= 'Completed'>Completed</option>".
					"<option value= 'Dropped'>Dropped</option>".
					"<option value= 'Canceled'>Canceled</option>".
				"</select>".
				"</td>";
			}
			else if($row['STATUS'] == "Completed")
			{
				$returnValue .= "<td>".
				"<select style= 'font-size:16pt;' name= 'status' id= 'status'>".
					"<option value= 'Enrolled'>Enrolled</option>".
					"<option value= 'In Progress'>In Progress</option>".
					"<option value= 'Completed' selected>Completed</option>".
					"<option value= 'Dropped'>Dropped</option>".
					"<option value= 'Canceled'>Canceled</option>".
				"</select>".
				"</td>";
			}
			else if($row['STATUS'] == "Dropped")
			{
				$returnValue .= "<td>".
				"<select style= 'font-size:16pt;' name= 'status' id= 'status'>".
					"<option value= 'Enrolled'>Enrolled</option>".
					"<option value= 'In Progress'>In Progress</option>".
					"<option value= 'Completed'>Completed</option>".
					"<option value= 'Dropped' selected>Dropped</option>".
					"<option value= 'Canceled'>Canceled</option>".
				"</select>".
				"</td>";
			}
			else if($row['STATUS'] == "Canceled")
			{
				$returnValue .= "<td>".
				"<select style= 'font-size:16pt;' name= 'status' id= 'status'>".
					"<option value= 'Enrolled'>Enrolled</option>".
					"<option value= 'In Progress'>In Progress</option>".
					"<option value= 'Completed'>Completed</option>".
					"<option value= 'Dropped'>Dropped</option>".
					"<option value= 'Canceled' selected>Canceled</option>".
				"</select>".
				"</td>";
			}
			$returnValue .= "</tr><tr><td></td>";
			$returnValue .= "<td>" . 
			"<input type= 'button' class='button' name= 'update' id= 'update' value= 'Update'>" . "</td>";
			$returnValue .= "</tr>";
		}
		$returnValue .= "</tbody></table>";
	}
	echo $returnValue;
	mysqli_close($conn);
?>	