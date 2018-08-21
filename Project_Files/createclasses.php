<?php session_start();
	include('connect.php');
		$sql_command= "INSERT INTO CLASSES(CLASSCODE, CLASSNAME, SEC, ENROLLMENT, MAXENROLLMENT, STATUS, LOCATION, DAYS, STARTTIME, ENDTIME, FACULTYID, DESCR) VALUES ('".$_SESSION["classcode"]. "', '" .$_SESSION["classname"]. "', '" .$_SESSION["classsection"]. "', '" .$_SESSION["enrollment"]. "', '" .$_SESSION["maxenrollment"]. "', '" .$_SESSION["status"]. "', '" .$_SESSION["location"]. "', '" .$_SESSION["days"]. "', '" .$_SESSION["starttime"]. "', '" .$_SESSION["endtime"]. "', '" .$_SESSION["facultyid"]. "', '" .$_SESSION["descr"]. "');";
		$result= $conn->query($sql_command);
		$sql_command2= "SELECT * FROM FACULTY WHERE FACULTYID = '" .$_SESSION["facultyid"]."';";
		$result2= $conn->query($sql_command2);
		$row= mysqli_fetch_array($result2);
		$returnValue= "New class created successfully:".
		"<br>Class Code: " .$_SESSION["classcode"].
		"<br>Class Name: " .$_SESSION["classname"].
		"<br>Section: " .$_SESSION["classsection"].
		"<br>Max Enrollment: " .$_SESSION["maxenrollment"].
		"<br>Status: " .$_SESSION["status"].
		"<br>Location: " .$_SESSION["location"].
		"<br>Class Days: " .$_SESSION["days"].
		"<br>Start Time: " .$_SESSION["starttime"].
		"<br>End Time: " .$_SESSION["endtime"].
		"<br>Professor: " .$row["LASTNAME"]. ", " .$row["FIRSTNAME"].
		"<br>Class Description: <br><pre>" .$_SESSION["descr"]. "</pre>";
		echo $returnValue;
		mysqli_close($conn);
?>