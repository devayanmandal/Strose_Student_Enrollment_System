<?php session_start(); ?>
<?php
	include('connect.php');
	
	$sql_command= "SELECT * FROM ENROLLMENTS WHERE ENROLLMENTID = '" . $_SESSION["enrollmentid"] . "';";
	$result= $conn->query($sql_command);
	$row= mysqli_fetch_array($result);
	$sql_command2= 	"SELECT * FROM CLASSES WHERE CLASSID = '" . $row["CLASSID"]. "';";
	$result2= $conn->query($sql_command2);
	$row2= mysqli_fetch_array($result2);
	$prevEnroll= $row2["ENROLLMENT"];
	$currEnroll= $row2["ENROLLMENT"] - 1;
	$sql_command3= "UPDATE CLASSES SET ENROLLMENT = " .$currEnroll. " WHERE CLASSID = " .$row["CLASSID"]. ";";
	$result3= $conn->query($sql_command3);
	$sql_command4= "DELETE FROM ENROLLMENTS WHERE ENROLLMENTID = '" .$_SESSION["enrollmentid"]. "';";
	$result4= $conn->query($sql_command4);
	
	if(mysqli_affected_rows($conn) > 0)
	{
		$returnValue= "The enrollment with ENROLLMENTID: ".$_SESSION["enrollmentid"]. " has been deleted.";
	}
	else
	{
		$returnValue= "Enrollment not found.";
	}
	echo $returnValue;
	mysqli_close($conn);
?>