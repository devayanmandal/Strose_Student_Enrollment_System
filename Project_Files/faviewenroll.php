<?php session_start(); ?>
<?php
	include('connect.php');
	
	if(isset($_SESSION["tempclassid"]) && ! empty($_SESSION["tempclassid"]))
	{
		$sql_command= "SELECT * FROM ENROLLMENTS WHERE CLASSID = '" .$_SESSION["tempclassid"]. "' AND STATUS IN ('Enrolled', 'In Progress');";
		$result= $conn->query($sql_command);
	}
	
	$returnValue = "<table id='t01'><thead><tr><th>Student ID</th><th>First Name</th><th>Last Name</th></tr></thead><tbody>";
	while($row= mysqli_fetch_array($result))
	{
		$sql_command2= "SELECT * FROM STUDENT WHERE STUDENTID = '" .$row['STUDENTID']. "';";
		$result2= $conn->query($sql_command2);
		$row2= mysqli_fetch_array($result2);
		$returnValue .= "<tr>";
		$returnValue .= "<td>" . $row2['STUDENTID'] . "</td>";
		$returnValue .= "<td>" . $row2['FIRSTNAME'] . "</td>";
		$returnValue .= "<td>" . $row2['LASTNAME'] . "</td>";
		$returnValue .= "</tr>";
	}
	$returnValue .= "</tbody></table>";
	echo $returnValue;
	mysqli_close($conn);
?>