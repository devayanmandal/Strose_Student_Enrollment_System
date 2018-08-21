<?php session_start(); ?>
<?php
	include('connect.php');
	$returnValue= false;
	$classid= $_GET["classid2"];
	$classcode= $_GET["classcode"];
	$classname= $_GET["classname"];
	$classsection= $_GET["classsection"];
	$enrollment= $_GET["enrollment"];
	$maxenrollment= $_GET["maxenrollment"];
	$prevstatus= $_SESSION["tempstatus"];
	$status= $_GET["status"];
	$location= $_GET["location"];
	$days= $_GET["days"];
	$starttime= $_GET["starttime"];
	$endtime= $_GET["endtime"];
	$facultyid= $_GET["facultyid"];
	$descr= $_GET["descr"];
	
	if($classname == "")
	{
		$returnValue = "Cannot update due to invalid value for class name. Please enter the name of the class.";
		echo $returnValue;
		 mysqli_close($conn);
	}
	else if($maxenrollment <= 0 || $maxenrollment == "" )
	{
		$returnValue = "Cannot update due to invalid value for max enrollment. Must be greater than zero.";
		echo $returnValue;
		 mysqli_close($conn);
	}
	else if($maxenrollment < $enrollment)
	{
		$returnValue = "Cannot update due to invalid value for max enrollment. Must be greater than enrollment value.";
		echo $returnValue;
		 mysqli_close($conn);
	}
	else if($status == "Open" && $enrollment == $maxenrollment)
	{
		$returnValue = "Cannot update due to invalid status. ".
		"Number of students enrolled is equal to the max enrollment allowed. The class must therefore be closed.";
		echo $returnValue;
		 mysqli_close($conn);
	}	
	else if($location == "")
	{
		$returnValue = "Cannot update due to invalid location. Please enter the location where the class is to take place.";
		echo $returnValue;
		 mysqli_close($conn);
	}
	else if($descr == "")
	{
		$returnValue= "Cannot update due to invalid description. Please enter a description of the class.";
		echo $returnValue;
		 mysqli_close($conn);
	}
	else
	{		
		$sql_command= "UPDATE CLASSES SET ".
		"CLASSID = '" .$classid.
		"', CLASSCODE= '" .$classcode.
		"', CLASSNAME = '" .$classname.
		"', SEC = '" .$classsection.
		"', ENROLLMENT = '" .$enrollment.
		"', MAXENROLLMENT = '" .$maxenrollment.
		"', STATUS = '" .$status.
		"', LOCATION = '" .$location.
		"', DAYS = '" .$days.
		"', STARTTIME = '" .$starttime. 
		"', ENDTIME = '" .$endtime.
		"', FACULTYID = '" .$facultyid.
		"', DESCR = '" .$descr.
		"' WHERE CLASSID = '" .$classid. "';";
		$result= $conn->query($sql_command);
		
		if($prevstatus == "Open")
		{
			if($status == "Closed")
			{
				$sql_command3= "UPDATE ENROLLMENTS SET STATUS = 'In Progress' WHERE CLASSID = '" .$classid. "' AND STATUS = 'Enrolled';";
				$result3= $conn->query($sql_command3);
			}
		}
		
		if(mysqli_affected_rows($conn) > 0)
		{
			$sql_command2= "SELECT * FROM FACULTY WHERE FACULTYID = '" .$facultyid. "';";
			$result2= $conn->query($sql_command2);
			$row2= mysqli_fetch_array($result2);
			$returnValue= "Class updated successfully." . 
			"<br>Class ID: " .$classid .
			"<br>Class Code: " .$classcode .
			"<br>Class Name: " .$classname .
			"<br>Section: " .$classsection .
			"<br>Enrollment: " .$enrollment .
			"<br>Max Enrollment: " .$maxenrollment .
			"<br>Status: " .$status .
			"<br>Location: " .$location .
			"<br>Days: " .$days .
			"<br>Start Time: " .$starttime .
			"<br>End Time: " .$endtime .
			"<br>Professor: " .$row2["LASTNAME"]. ", " .$row2["FIRSTNAME"].
			"<br>Class Description: <br><pre>" .$descr. "</pre>";
		}
		echo $returnValue;
		 mysqli_close($conn);	
	}
?>