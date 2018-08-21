<?php session_start(); ?>
<?php 
	include('connect.php');
	$enrollmentid= $_GET["enrollmentid"];
	$returnValue= false;
	
	if(isset($enrollmentid) && ! empty($enrollmentid))
	{
		$sql_command= "SELECT * FROM ENROLLMENTS WHERE ENROLLMENTID = '" .$enrollmentid. "';";
		$result= $conn->query($sql_command);
	}
	
	if(mysqli_fetch_array($result) > 0)
	{
		$_SESSION["enrollmentid"]= $enrollmentid;
		$returnValue= true;
	}
	echo $returnValue;
	mysqli_close($conn);
?>	