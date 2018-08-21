<?php session_start(); ?>
<?php
	include('connect.php');
	$enrollmentid= $_GET['enrollmentid'];
	$studentid= $_SESSION['userid'];
	$returnValue= "";
	
	if(preg_match('/[1-9][0-9]{4}/', $enrollmentid) == 0)
	{
		$returnValue= "Please enter a valid Enrollment ID.";
	}
	else
	{
		$sql_command= "SELECT * FROM ENROLLMENTS WHERE ENROLLMENTID = '" .$enrollmentid. "' AND STUDENTID = '" .$studentid. "';";
		$result= $conn->query($sql_command);
		$row= mysqli_fetch_array($result);
		
		if ($row > 0)
		{
			if($row['STATUS'] == "Enrolled" || $row['STATUS'] == "In Progress")
			{
				$_SESSION['tempenrollmentid']= $enrollmentid;
				$returnValue= true;
			}
			else if($row['STATUS'] == "Completed")
			{
				$returnValue= "Course cannot be droped as it has already been completed by the student.";
			}
			else if($row['STATUS'] == "Canceled")
			{
				$returnValue= "Course cannot be dropped as it has already been canceled.";
			}
			else if($row['STATUS'] == "Dropped")
			{
				$returnValue= "This course has already been dropped.";
			}
		}
		else
		{
			$returnValue= "You are not enrolled in this course.";
		}
	}
	echo $returnValue;
	mysqli_close($conn);
?>