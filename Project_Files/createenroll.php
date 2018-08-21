<?php session_start(); ?>
<?php
	include('connect.php');
	$returnValue= "";
	
	$sql_command= "SELECT * FROM CLASSES WHERE CLASSID = '" .$_SESSION["tempclassid"]. "';";
	$result= $conn->query($sql_command);
	$row= mysqli_fetch_array($result);
	
	if($row > 0)
	{
		if($row["ENROLLMENT"] < $row["MAXENROLLMENT"])
		{				
				$currEnroll= $row["ENROLLMENT"] + 1;
				
				$sql_command2= "UPDATE CLASSES SET ENROLLMENT = '" .$currEnroll. 
				"' WHERE CLASSID = '" .$row["CLASSID"]. "';";
				$result2= $conn->query($sql_command2);
				
				$sql_command3= "INSERT INTO ENROLLMENTS".
				"(STUDENTID, CLASSID, FACULTYID, CLASSCODE, SEC, STATUS) ".
				"VALUES ('" .$_SESSION["tempstudentid"]. 
				"', '" .$row["CLASSID"]. 
				"', '" .$row["FACULTYID"]. 
				"', '" .$row["CLASSCODE"]. 
				"', '" .$row["SEC"]. 
				"', 'Enrolled');";
				
				$result3= $conn->query($sql_command3);
				$returnValue = true;
		}
		else
		{
			$returnValue= "Class has reached its maximum capacity. Unable to create enrollment.";
		}
	}
	else
	{
		$returnValue= "Class cannot be found. Unable to create enrollment";
	}
	echo $returnValue;
	mysqli_close($conn);
?>