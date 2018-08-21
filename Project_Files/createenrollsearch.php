<?php session_start(); ?>
<?php
	include('connect.php');
	$studentid= $_GET["studentid"];
	$classid= $_GET["classid"];
	$classcode= "";
	$returnValue= false;

	$sql_command= "SELECT * FROM CLASSES WHERE CLASSID = '" .$classid. "';";
	$result= $conn->query($sql_command);
	while($row= mysqli_fetch_array($result))
	{
		$classcode= $row["CLASSCODE"];
	}
	
	$sql_command2= "SELECT * FROM ENROLLMENTS WHERE CLASSCODE = '" .$classcode. "' AND STUDENTID = '" .$studentid. "' AND STATUS IN ('Enrolled','Completed','In Progress');";
	$result2= $conn->query($sql_command2);
	
	if(mysqli_num_rows($result2) > 0)
	{
		$row2= mysqli_fetch_array($result2);
		if($row2["STATUS"] == "Enrolled" && $row2["CLASSID"] == $classid)
		{
			$returnValue= "Unable to create enrollment. Student has already been enrolled into this course and section.";
		}
		else if($row2["STATUS"] == "Enrolled" && $row2["CLASSID"] != $classid)
		{
			$returnValue= "Unable to create enrollment. Student has already been enrolled into this course but within a different section.";
		}
		else if($row2["STATUS"] == "In Progress" && $row2["CLASSID"] == $classid)
		{
			$returnValue= "Unable to create enrollment. Student status is currently IN PROGRESS in this course and section.";
		}
		else if($row2["STATUS"] == "In Progress" && $row2["CLASSID"] != $classid)
		{
			$returnValue= "Unable to create enrollment. Student status is currently IN PROGRESS in this course but within a different section.";
		}
		else if($row2["STATUS"] == "Completed")
		{
			$returnValue = "Unable to create enrollment. Student has already completed this course.";
		}
	}
	else
	{
		$_SESSION["tempstudentid"]= $studentid;
		$_SESSION["tempclassid"]= $classid;
	}
	echo $returnValue;
	mysqli_close($conn);
?>