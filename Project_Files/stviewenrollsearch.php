<?php session_start(); ?>
<?php 
	include('connect.php');
	$studentid= $_SESSION["userid"];
	$returnValue= false;
	
	if(isset($studentid) && ! empty($studentid))
	{
		$sql_command= "SELECT * FROM ENROLLMENTS WHERE STUDENTID = '" .$studentid. "';";
		$result= $conn->query($sql_command);
	}	
	if(mysqli_num_rows($result) > 0)
	{
		$_SESSION["tempstudentid"]= $studentid;
		$returnValue= true;
	}
	echo $returnValue;
	mysqli_close($conn);
?>	