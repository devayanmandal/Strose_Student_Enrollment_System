<?php session_start(); ?>
<?php
	include('connect.php');
	$enrollmentid= $_GET["enrollmentid2"];
	$studentid= $_GET["studentid2"];
	$classid= $_GET["classid2"];
	$facultyid= $_GET["facultyid"];
	$classcode= $_GET["classcode"];
	$section= $_GET["section"];
	$status= $_GET["status"];
	$prevstatus= $_SESSION["prevstatus"];
	$shiftFlag= "";
	$returnValue= false;
	
	if($prevstatus == $status)
	{
		$shiftFlag= false;
	}
	else if($prevstatus == "Enrolled")
	{
		if($status == "In Progress")
		{
			$shiftFlag= true;
		}
		else if($status == "Completed")
		{
			$sql_command2= "SELECT * FROM CLASSES WHERE CLASSID = '" . $classid. "';";
			$result2= $conn->query($sql_command2);
			$row2= mysqli_fetch_array($result2);
			$prevEnroll= intval($row2['ENROLLMENT']);
			$currEnroll= $prevEnroll - 1;
			$sql_command3= "UPDATE CLASSES SET ENROLLMENT = '" .$currEnroll. "' WHERE CLASSID = '" .$classid. "';";
			$result3= $conn->query($sql_command3);
			$shiftFlag= true;
		}
		else if($status == "Dropped")
		{
			$sql_command4= "SELECT * FROM CLASSES WHERE CLASSID = '" . $classid. "';";
			$result4= $conn->query($sql_command4);
			$row4= mysqli_fetch_array($result4);
			$prevEnroll= intval($row4['ENROLLMENT']);
			$currEnroll= $prevEnroll - 1;
			$sql_command5= "UPDATE CLASSES SET ENROLLMENT = '" .$currEnroll. "' WHERE CLASSID = '" .$classid. "';";
			$result5= $conn->query($sql_command5);
			$shiftFlag= true;
		}
		else if($status == "Canceled")
		{
			$sql_command6= "SELECT * FROM CLASSES WHERE CLASSID = '" . $classid. "';";
			$result6= $conn->query($sql_command6);
			$row6= mysqli_fetch_array($result6);
			$prevEnroll= intval($row6['ENROLLMENT']);
			$currEnroll= $prevEnroll - 1;
			$sql_command7= "UPDATE CLASSES SET ENROLLMENT = '" .$currEnroll. "' WHERE CLASSID = '" .$classid. "';";
			$result7= $conn->query($sql_command7);
			$shiftFlag= true;
		}
	}
	else if($prevstatus == "In Progress")
	{
		if($status == "Enrolled")
		{
			$shiftFlag= true;
		}
		else if($status == "Completed")
		{
			$sql_command8= "SELECT * FROM CLASSES WHERE CLASSID = '" . $classid. "';";
			$result8= $conn->query($sql_command8);
			$row8= mysqli_fetch_array($result8);
			$prevEnroll= intval($row8['ENROLLMENT']);
			$currEnroll= $prevEnroll - 1;
			$sql_command9= "UPDATE CLASSES SET ENROLLMENT = '" .$currEnroll. "' WHERE CLASSID = '" .$classid. "';";
			$result9= $conn->query($sql_command9);
			$shiftFlag= true;
		}
		else if($status == "Dropped")
		{
			$sql_command10= "SELECT * FROM CLASSES WHERE CLASSID = '" . $classid. "';";
			$result10= $conn->query($sql_command10);
			$row10= mysqli_fetch_array($result10);
			$prevEnroll= intval($row10['ENROLLMENT']);
			$currEnroll= $prevEnroll - 1;
			$sql_command11= "UPDATE CLASSES SET ENROLLMENT = '" .$currEnroll. "' WHERE CLASSID = '" .$classid. "';";
			$result11= $conn->query($sql_command11);
			$shiftFlag= true;
		}
		else if($status == "Canceled")
		{
			$sql_command12= "SELECT * FROM CLASSES WHERE CLASSID = '" . $classid. "';";
			$result12= $conn->query($sql_command12);
			$row12= mysqli_fetch_array($result12);
			$prevEnroll= intval($row12['ENROLLMENT']);
			$currEnroll= $prevEnroll - 1;
			$sql_command13= "UPDATE CLASSES SET ENROLLMENT = '" .$currEnroll. "' WHERE CLASSID = '" .$classid. "';";
			$result13= $conn->query($sql_command13);
			$shiftFlag= true;
		}
	}
	else if($prevstatus == "Completed")
	{
		if($status == "Enrolled")
		{
			$sql_command14= "SELECT * FROM CLASSES WHERE CLASSID = '" . $classid. "';";
			$result14= $conn->query($sql_command14);
			$row14= mysqli_fetch_array($result14);
			
			if(intval($row14['ENROLLMENT']) >= intval($row14['MAXENROLLMENT']))
			{
				$shiftFlag= "xx";
			}
			else
			{
				$prevEnroll= intval($row14['ENROLLMENT']);
				$currEnroll= $prevEnroll + 1;
				$sql_command15= "UPDATE CLASSES SET ENROLLMENT = '" .$currEnroll. "' WHERE CLASSID = '" .$classid. "';";
				$result15= $conn->query($sql_command15);
				$shiftFlag= true;
			}
		}
		else if($status == "In Progress")
		{
			$sql_command16= "SELECT * FROM CLASSES WHERE CLASSID = '" . $classid. "';";
			$result16= $conn->query($sql_command16);
			$row16= mysqli_fetch_array($result16);
			
			if(intval($row16['ENROLLMENT']) >= intval($row16['MAXENROLLMENT']))
			{
				$shiftFlag= "xx";
			}
			else
			{
				$prevEnroll= intval($row16['ENROLLMENT']);
				$currEnroll= $prevEnroll + 1;
				$sql_command17= "UPDATE CLASSES SET ENROLLMENT = '" .$currEnroll. "' WHERE CLASSID = '" .$classid. "';";
				$result17= $conn->query($sql_command17);
				$shiftFlag= true;
			}
		}
		else if($status == "Dropped")
		{
			$shiftFlag= true;
		}
		else if( $status == "Canceled")
		{
			$shiftFlag= true;
		}
	}
	else if($prevstatus == "Dropped")
	{
		if($status == "Enrolled")
		{
			$sql_command18= "SELECT * FROM CLASSES WHERE CLASSID = '" . $classid. "';";
			$result18= $conn->query($sql_command18);
			$row18= mysqli_fetch_array($result18);
			
			if(intval($row18['ENROLLMENT']) >= intval($row18['MAXENROLLMENT']))
			{
				$shiftFlag= "xx";
			}
			else
			{
				$prevEnroll= intval($row18['ENROLLMENT']);
				$currEnroll= $prevEnroll + 1;
				$sql_command19= "UPDATE CLASSES SET ENROLLMENT = '" .$currEnroll. "' WHERE CLASSID = '" .$classid. "';";
				$result19= $conn->query($sql_command19);
				$shiftFlag= true;
			}
		}
		else if($status == "In Progress")
		{
			$sql_command20= "SELECT * FROM CLASSES WHERE CLASSID = '" . $classid. "';";
			$result20= $conn->query($sql_command20);
			$row20= mysqli_fetch_array($result20);
			
			if(intval($row20['ENROLLMENT']) >= intval($row20['MAXENROLLMENT']))
			{
				$shiftFlag= "xx";
			}
			else
			{
				$prevEnroll= intval($row20['ENROLLMENT']);
				$currEnroll= $prevEnroll + 1;
				$sql_command21= "UPDATE CLASSES SET ENROLLMENT = '" .$currEnroll. "' WHERE CLASSID = '" .$classid. "';";
				$result21= $conn->query($sql_command21);
				$shiftFlag= true;
			}
		}
		else if($status == "Completed")
		{
			$shiftFlag= true;
		}
		else if($status == "Canceled")
		{
			$shiftFlag= true;
		}
	}
	else if($prevstatus == "Canceled")
	{
		if($status == "Enrolled")
		{
			$sql_command22= "SELECT * FROM CLASSES WHERE CLASSID = '" . $classid. "';";
			$result22= $conn->query($sql_command22);
			$row22= mysqli_fetch_array($result22);
			
			if(intval($row22['ENROLLMENT']) >= intval($row22['MAXENROLLMENT']))
			{
				$shiftFlag= "xx";
			}
			else
			{
				$prevEnroll= intval($row22['ENROLLMENT']);
				$currEnroll= $prevEnroll + 1;
				$sql_command23= "UPDATE CLASSES SET ENROLLMENT = '" .$currEnroll. "' WHERE CLASSID = '" .$classid. "';";
				$result23= $conn->query($sql_command23);
				$shiftFlag= true;
			}
		}
		else if($status == "In Progress")
		{
			$sql_command24= "SELECT * FROM CLASSES WHERE CLASSID = '" . $classid. "';";
			$result24= $conn->query($sql_command24);
			$row24= mysqli_fetch_array($result24);
			
			if(intval($row24['ENROLLMENT']) >= intval($row24['MAXENROLLMENT']))
			{
				$shiftFlag= "xx";
			}
			else
			{
				$prevEnroll= intval($row24['ENROLLMENT']);
				$currEnroll= $prevEnroll + 1;
				$sql_command25= "UPDATE CLASSES SET ENROLLMENT = '" .$currEnroll. "' WHERE CLASSID = '" .$classid. "';";
				$result25= $conn->query($sql_command25);
				$shiftFlag= true;
			}
		}
		else if($status == "Completed")
		{
			$shiftFlag= true;
		}
		else if($status == "Dropped")
		{
			$shiftFlag= true;
		}
	}
	
	if($shiftFlag == true)
	{
		$sql_command= "UPDATE ENROLLMENTS SET ".
		"ENROLLMENTID = '" .$enrollmentid.
		"', STUDENTID = '" .$studentid.
		"', CLASSID = '" .$classid.
		"', FACULTYID = '" .$facultyid.
		"', CLASSCODE = '" .$classcode.
		"', SEC = '" .$section.
		"', STATUS = '" .$status. 
		"' WHERE ENROLLMENTID = '" .$enrollmentid. "';";
		$result= $conn->query($sql_command);
		if($result)
		{
			$returnValue= "Enrollment updated successfully." . 
			"<br>Enrollment ID: " .$enrollmentid .
			"<br>Student ID: " .$studentid .
			"<br>Class Code: " .$classcode .
			"<br>Section: " .$section .
			"<br>Status: " .$status;
		}
		
	}
	else if($shiftFlag == "xx")
	{
		$returnValue= "xx";
	}
	echo $returnValue;
	mysqli_close($conn);
?>
