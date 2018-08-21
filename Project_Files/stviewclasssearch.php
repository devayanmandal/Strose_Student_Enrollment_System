<?php session_start(); ?>
<?php 
$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname="mandal";
		$conn = new mysqli($servername, $username, $password,$dbname);
	$classid= $_GET["classid"];
	$classcode= $_GET["classcode"];
	$returnValue= false;
	
	if(isset($classid) && ! empty($classid))
	{
		$sql_command= "SELECT * FROM CLASSES WHERE CLASSID LIKE '" .$classid. "%';";			
	//echo $sql_command;
		$result= $conn->query($sql_command);
	}
	else if(isset($classcode) && ! empty($classcode))
	{
		$sql_command= "SELECT * FROM CLASSES WHERE CLASSCODE LIKE '" .$classcode. "%';";
	//echo $sql_command;
		$result= $conn->query($sql_command);
	}
	
	if($result->fetch_array() > 0)
	{
		$_SESSION["classid"]= $classid;
		$_SESSION["classcode"]= $classcode;
		$returnValue= true;
	}
	echo $returnValue;
	mysqli_close($conn);
?>	