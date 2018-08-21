<?php session_start(); ?>
<?php
	include('connect.php');
	
	if(isset($_SESSION["tempstudentid"]) && ! empty($_SESSION["tempstudentid"]))
	{
		$sql_command= "SELECT * FROM ENROLLMENTS WHERE STUDENTID = '" .$_SESSION["tempstudentid"]. "';";
		$result= $conn->query($sql_command);
	}
	
	$returnValue= "<table id='t01'><thead><tr><th>Enrollment ID</th>".
	"<th>Class Code</th><th>Class Name</th><th>Section</th><th>Start Time</th>".
	"<th>End Time</th><th>Professor</th><th>Enrollment Status</th></tr></thead><tbody>";
	while($row= mysqli_fetch_array($result))
	{
		$sql_command2= "SELECT * FROM CLASSES WHERE CLASSID = '" .$row['CLASSID']. "';";
		$result2= $conn->query($sql_command2);
		$row2= mysqli_fetch_array($result2);
		
		$sql_command3= "SELECT * FROM FACULTY WHERE FACULTYID = '" .$row['FACULTYID']. "';";
		$result3= $conn->query($sql_command3);
		$row3= mysqli_fetch_array($result3);
		
		$returnValue .= "<tr>";
		$returnValue .= "<td>" . $row['ENROLLMENTID'] . "</td>";
		$returnValue .= "<td>" . $row['CLASSCODE'] . "</td>";
		$returnValue .= "<td>" . $row2['CLASSNAME'] . "</td>";
		$returnValue .= "<td>" . $row['SEC'] . "</td>";
		$returnValue .= "<td>" . $row2['STARTTIME'] . "</td>";
		$returnValue .= "<td>" . $row2['ENDTIME'] . "</td>";
		$returnValue .= "<td>" .$row3['LASTNAME']. ", " .$row3['FIRSTNAME']. "</td>";
		$returnValue .= "<td>" . $row['STATUS'] . "</td>";
		$returnValue .= "</tr>";
	}
	$returnValue .= "</tbody></table>";
	echo $returnValue;
	mysqli_close($conn);
?>