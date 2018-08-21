<?php session_start(); ?>
<?php 
	include('connect.php');
	$classid= $_GET["classid"];
	$returnValue= false;
	
	if(isset($classid) && ! empty($classid))
	{
		$sql_command= "SELECT * FROM CLASSES WHERE CLASSID = '" .$classid. "';";			
		$result= $conn->query($sql_command);
	}
	
	if(mysqli_num_rows($result) > 0)
	{		
		while($row= mysqli_fetch_array($result))
		{
			$returnValue= "<table border= '2'><thead><tr><th colspan='2'>Information</th></tr></thead><tbody>";
		/*	"<th>Class Code</th><th>Class Name</th><th>Section</th><th>Enrollment</th><th>Max Enrollment</th><th>Status</th><th>Location</th><th>Days</th><th>Start Time</th><th>End Time</th>";
			*/
			$returnValue .= "<tr><td>Class ID</td>";
			$returnValue .= "<td>" . "<input style= 'font-size:16pt; font-family:Century Gothic; background:#ccc; color:white;' type= 'text' name= 'classid2' id= 'classid2' size= '3' value= '" . $row['CLASSID'] . "' readonly></td>";
			$returnValue .= "</tr><tr><td>Class Code</td>";
			$returnValue .= "<td>" . "<input style= 'font-size:16pt; font-family:Century Gothic; background:#ccc; color:white;' type= 'text' name= 'classcode' id= 'classcode' value= '" .$row['CLASSCODE']. "' readonly></td>";
			$returnValue .= "</tr><tr><td>Class Name</td>";
			$returnValue .= "<td>" . "<input style= 'font-size:16pt;' type= 'text' name= 'classname' id= 'classname' value= '" . $row['CLASSNAME'] . "'></td>";
			$returnValue .= "</tr><tr><td>Section</td>";
			$returnValue .= "<td>" . "<input style= 'font-size:16pt; font-family:Century Gothic; background:#ccc; color:white;' type= 'text' name= 'classsection' id= 'classsection' size= '3' value= '" . $row['SEC'] . "' readonly></td>";
			$returnValue .= "</tr><tr><td>Enrollment</td>";
			$returnValue .= "<td>" . "<input style= 'font-size:16pt; font-family:Century Gothic; background:#ccc; color:white;' type= 'text' name= 'enrollment' id= 'enrollment' size= '4' value= '" . $row['ENROLLMENT'] . "' readonly></td>";
			$returnValue .= "</tr><tr><td>Max Enrollment</td>";
			$returnValue .= "<td>" . "<input style= 'font-size:16pt;' type= 'text' name= 'maxenrollment' id= 'maxenrollment' size= '4' value= '" . $row['MAXENROLLMENT'] . "'></td>";
			$returnValue .= "</tr><tr><td>Status</td>";
			if($row['STATUS'] == "Open")
			{
				$returnValue .= "<td><select style= 'font-size:16pt;' name= 'status' id= 'status'><option value= 'Open' selected>Open</option><option value= 'Closed'>Closed</option></select></td>";
			}
			else if($row['STATUS'] == "Closed")
			{
				$returnValue .= "<td><select style= 'font-size:16pt;' name= 'status' id= 'status'><option value= 'Open'>Open</option><option value= 'Closed' selected>Closed</option></select></td>";
			}
			
			$_SESSION['tempstatus']= $row['STATUS'];
			$returnValue .= "</tr><tr><td>Location</td>";
			$returnValue .= "<td>" . "<input style= 'font-size:16pt;' type= 'text' name= 'location' id= 'location' value= '" . $row['LOCATION'] . "'></td>";
			$returnValue .= "</tr><tr><td>Days</td>";
			$returnValue .= "<td>" . "<input style= 'font-size:16pt; font-family:Century Gothic; background:#ccc; color:white;' type= 'text' name= 'days' id= 'days'  value= '" . $row['DAYS'] . "' readonly></td>";
			$returnValue .= "</tr><tr><td>Start Time</td>";
			$returnValue .= "<td>" . "<input style= 'font-size:16pt; font-family:Century Gothic; background:#ccc; color:white;' type= 'text' name= 'starttime' id= 'starttime'  value= '" . $row['STARTTIME'] . "' readonly></td>";
			$returnValue .= "</tr><tr><td>End Time</td>";
			$returnValue .= "<td>" . "<input style= 'font-size:16pt; font-family:Century Gothic; background:#ccc; color:white;' type= 'text' name= 'endtime' id= 'endtime'  value= '" . $row['ENDTIME'] . "' readonly></td>";
			$returnValue .= "</tr><tr><td>Faculty</td>";
			$sql_command2= "SELECT * FROM FACULTY;";
			$result2= $conn->query($sql_command2);
			$returnValue .= "<td>"."<select style= 'font-size:16pt;' name= 'facultyid' id= 'facultyid'>";
			while($row2= mysqli_fetch_array($result2))
			{
				if($row['FACULTYID'] == $row2['FACULTYID'])
				{
					$returnValue .= "<option value='" .$row2["FACULTYID"]. "' selected>" .$row2["LASTNAME"]. ", " .$row2["FIRSTNAME"]. "</option>";
				}
				else
				{
					$returnValue .= "<option value='" .$row2["FACULTYID"]. "'>" .$row2["LASTNAME"]. ", " .$row2["FIRSTNAME"]. "</option>";
				}
			}
			$returnValue .= "</select></td>";
			$returnValue .= "</tr><tr><td>Class Description</td><td><textarea style= 'font-size:16pt; font-family:Arial;' name= 'descr' id= 'descr' wrap= 'hard' maxlength= '250' rows= '10' cols= '50'>".$row['DESCR']."</textarea></td>";
			$returnValue .= "</tr><tr><td></td><td><input type= 'button' name= 'update' class='button' id= 'update' value= 'Update'></td></tr>";
			
			$returnValue .= "</tbody></table>"; 	 			
					
		}
	}
	echo $returnValue;
	mysqli_close($conn);
?>	