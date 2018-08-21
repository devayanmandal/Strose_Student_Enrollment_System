<?php session_start(); ?>
<?php
	include('connect.php');
	
	if(isset($_SESSION["tempstudentid"]) && ! empty($_SESSION["tempstudentid"]))
	{
		$sql_command= "SELECT * FROM ENROLLMENTS WHERE STUDENTID LIKE '" .$_SESSION["tempstudentid"]. "%';";
		$result= $conn->query($sql_command);
	}
	else if(isset($_SESSION["tempfacultyid"]) && ! empty($_SESSION["tempfacultyid"]))
	{
		$sql_command= "SELECT * FROM ENROLLMENTS WHERE FACULTYID LIKE '" .$_SESSION["tempfacultyid"]. "%';";
		$result= $conn->query($sql_command);
	}
	else if(isset($_SESSION["tempclassid"]) && ! empty($_SESSION["tempclassid"]))
	{
		$sql_command= "SELECT * FROM ENROLLMENTS WHERE CLASSID LIKE '" .$_SESSION["tempclassid"]. "%';";
		$result= $conn->query($sql_command);
	}
	
	$returnValue= "<table id='t01' class='info-table'><thead><tr><th>Enrollment ID</th>".
	"<th>Student ID</th><th>Class ID</th><th>Faculty ID</th><th>Class Code</th>".
	"<th>Section</th><th>Status</th></tr></thead><tbody>";
	while($row= mysqli_fetch_array($result))
	{
		$returnValue .= "<tr>";
		$returnValue .= "<td>" . $row['ENROLLMENTID'] . "</td>";
		$returnValue .= "<td>" . $row['STUDENTID'] . "</td>";
		$returnValue .= "<td>" . $row['CLASSID'] . "</td>";
		$returnValue .= "<td>" . $row['FACULTYID'] . "</td>";
		$returnValue .= "<td>" . $row['CLASSCODE'] . "</td>";
		$returnValue .= "<td>" . $row['SEC'] . "</td>";
		$returnValue .= "<td>" . $row['STATUS'] . "</td>";
		$returnValue .= "</tr>";
	}
	$returnValue .= "</tbody></table>";
	echo $returnValue;
	mysqli_close($conn);
?>