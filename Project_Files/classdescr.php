<?php session_start(); ?>
<?php
	include('connect.php');
	$descrid= $_GET["descrid"];
	$sql_command= "SELECT DESCR FROM CLASSES WHERE CLASSID= '" .$descrid. "';";
	$result= $conn->query($sql_command);
	
	if(mysqli_num_rows($result) > 0)
	{
		$row= mysqli_fetch_array($result);
		$returnValue= $row['DESCR'];
	}
	else
	{
		$returnValue= "No information found.";
	}
	echo $returnValue;
	mysqli_close($conn);
?>