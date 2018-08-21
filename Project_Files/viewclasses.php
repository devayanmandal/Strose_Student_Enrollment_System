<?php session_start();
		include('connect.php');
	
	
	if(isset($_SESSION["classid"]) && ! empty($_SESSION["classid"]))
	{
		$sql_command= "SELECT * FROM CLASSES WHERE CLASSID LIKE '" .$_SESSION["classid"]. "%';";
		$result= $conn->query($sql_command);
	}
	else if(isset($_SESSION["classcode"]) && ! empty($_SESSION["classcode"]))
	{
		$sql_command= "SELECT * FROM CLASSES WHERE CLASSCODE LIKE '" .$_SESSION["classcode"]. "%';";
		$result= $conn->query($sql_command);
	}
	
	$returnValue= "<table id='t01' class='info-table'><thead><tr><th>Class ID</th><th>Class Code</th><th>Class Title</th><th>Class Section</th><th>Enrollment</th><th>Max Enrollment</th><th>Class Status</th><th>Location</th><th>Session Days</th><th>Start Time</th><th>End Time</th><th>Professor</th></tr></thead><tbody>";
	while($row= mysqli_fetch_array($result))
	{
		$returnValue .= "<tr>";
		$returnValue .= "<td>" . $row['CLASSID'] . "</td>";
		$returnValue .= "<td>" . $row['CLASSCODE'] . "</td>";
		$returnValue .= "<td>" . $row['CLASSNAME'] . "</td>";
		$returnValue .= "<td>" . $row['SEC'] . "</td>";
		$returnValue .= "<td>" . $row['ENROLLMENT'] . "</td>";
		$returnValue .= "<td>" . $row['MAXENROLLMENT'] . "</td>";
		$returnValue .= "<td>" . $row['STATUS'] . "</td>";
		$returnValue .= "<td>" . $row['LOCATION'] . "</td>";
		$returnValue .= "<td>" . $row['DAYS'] . "</td>";
		$returnValue .= "<td>" . $row['STARTTIME'] . "</td>";
		$returnValue .= "<td>" . $row['ENDTIME'] . "</td>";
		
		$sql_command2= "SELECT * FROM FACULTY WHERE FACULTYID LIKE '" .$row['FACULTYID']. "';";
		$result2= $conn->query($sql_command2);
		$row2= mysqli_fetch_array($result2);
		
		$returnValue .= "<td>" . $row2['LASTNAME'] .", " .$row2['FIRSTNAME']. "</td>";
		$returnValue .= "<td>" . "<input type= 'button' name= 'descr' id= 'descr' value= 'Class Description'>" . "</td>";
		$returnValue .= "</tr>";
	}
	$returnValue .= "</tbody></table>";
	echo $returnValue;
	mysqli_close($conn);
?>