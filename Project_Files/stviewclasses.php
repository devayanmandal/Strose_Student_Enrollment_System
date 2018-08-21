<?php session_start(); ?>
<?php
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
	
	$returnValue= "<table style= 'font-size:10pt; width:100%;' id='t01'><thead><tr><th>Class ID</th><th>Class Code</th><th>Class Title</th><th>Class Section</th><th>Enrollment</th><th>Max Enrollment</th><th>Class Status</th><th>Location</th><th>Session Days</th><th>Start Time</th><th>End Time</th><th>Faculty ID</th><th>View </th></tr></thead><tbody>";
	while($row= $result->fetch_array())
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
		$returnValue .= "<td>" . $row['FACULTYID'] . "</td>";
		$returnValue .= "<td>" . "<input type= 'button' name= 'descr' id= 'descr' value= 'Class Description'>" . "</td>";
		$returnValue .= "</tr>";
	}
	$returnValue .= "</tbody></table>";
	echo $returnValue;
	mysqli_close($conn);
?>