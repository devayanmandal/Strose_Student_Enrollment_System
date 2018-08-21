<?php session_start(); ?>
<?php 
		include('connect.php');
	$classid= $_GET["classid"];
	$classcode= $_GET["classcode"];
	$returnValue= false;
	
	if(isset($classid) && ! empty($classid))
	{
		$sql_command= "SELECT * FROM CLASSES WHERE CLASSID LIKE '" .$classid. "%';";			
		$result= $conn->query($sql_command);
	}
	else if(isset($classcode) && ! empty($classcode))
	{
		$sql_command= "SELECT * FROM CLASSES WHERE CLASSCODE LIKE '" .$classcode. "%';";
		$result= $conn->query($sql_command);
	}
	
	if(mysqli_fetch_array($result) > 0)
	{
		$_SESSION["classid"]= $classid;
		$_SESSION["classcode"]= $classcode;
		$returnValue= true;
	}
	echo $returnValue;
	mysqli_close($conn);
?>	