<?php session_start(); ?>
<?php 
	include('connect.php');
	$classid= $_GET["classid"];
	$returnValue= false;

	$sql_command= "SELECT * FROM ENROLLMENTS WHERE CLASSID = '" .$classid. "';";
	$result= $conn->query($sql_command);
		
	if(mysqli_num_rows($result) > 0)
	{
		$_SESSION["tempclassid"]= $classid;
		$returnValue= true;
	}
	echo $returnValue;
	mysqli_close($conn);
?>	