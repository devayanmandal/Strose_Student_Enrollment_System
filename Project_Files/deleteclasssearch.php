<?php session_start(); ?>
<?php 
		include('connect.php');
	$classid= $_GET["classid"];
	$returnValue= false;
	
	if(isset($classid) && ! empty($classid))
	{
		$sql_command= "SELECT * FROM CLASSES WHERE CLASSID = '" .$classid. "';";
		$result= $conn->query($sql_command);
	}
	
	if(mysqli_fetch_array($result) > 0)
	{
		$_SESSION["classid"]= $classid;
		$returnValue= true;
	}
	echo $returnValue;
	mysqli_close($conn);
?>	