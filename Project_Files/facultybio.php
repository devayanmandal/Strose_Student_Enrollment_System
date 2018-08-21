<?php session_start(); ?>
<?php
	include('connect.php');
	$bioid= $_GET["bioid"];
	$sql_command= "SELECT BIO FROM FACULTY WHERE FACULTYID= '" .$bioid. "';";
	$result= $conn->query($sql_command);
	
	if(mysqli_num_rows($result) > 0)
	{
		$row= mysqli_fetch_array($result);
		$returnValue= $row['BIO'];
	}
	else
	{
		$returnValue= "No information found.";
	}
	echo $returnValue;
	mysqli_close($conn);
?>