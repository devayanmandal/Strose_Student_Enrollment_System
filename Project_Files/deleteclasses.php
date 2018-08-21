<?php session_start(); ?>
<?php
		include('connect.php');
	$sql_command= "UPDATE ENROLLMENTS SET STATUS = 'Canceled' WHERE CLASSID = '" .$_SESSION["classid"]. "' AND STATUS IN ('Enrolled','In Progress');";
	$result= $conn->query($sql_command);
	$sql_command2= "DELETE FROM CLASSES WHERE CLASSID = '" .$_SESSION["classid"]. "';";
	$result2= $conn->query($sql_command2);
	
	if(mysqli_affected_rows($conn) > 0)
	{
		$returnValue= "The class with CLASSID: ".$_SESSION["classid"]. " has been deleted.";
	}
	else
	{
		$returnValue= "Class not found.";
	}
	echo $returnValue;
	mysqli_close($conn);
?>