<?php session_start(); ?>
<?php 
	include('connect.php');
	$studentid= $_GET["studentid"];
	$facultyid= $_GET["facultyid"];
	$classid= $_GET["classid"];
	$returnValue= false;
	
	if(isset($studentid) && ! empty($studentid))
	{
		$sql_command= "SELECT * FROM ENROLLMENTS WHERE STUDENTID LIKE '" .$studentid. "%';";
		$result= $conn->query($sql_command);
	}	
	else if(isset($facultyid) && ! empty($facultyid))
	{
		$sql_command= "SELECT * FROM ENROLLMENTS WHERE FACULTYID LIKE '" .$facultyid. "%';";
		$result= $conn->query($sql_command);
	}
	else if(isset($classid) && ! empty($classid))
	{
		$sql_command= "SELECT * FROM ENROLLMENTS WHERE CLASSID LIKE '" .$classid. "%';";
		$result= $conn->query($sql_command);
	}
	if(mysqli_num_rows($result) > 0)
	{
		$_SESSION["tempstudentid"]= $studentid;
		$_SESSION["tempfacultyid"]= $facultyid;
		$_SESSION["tempclassid"]= $classid;
		$returnValue= true;
	}
	echo $returnValue;
	mysqli_close($conn);
?>	