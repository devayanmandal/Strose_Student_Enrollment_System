<?php session_start(); ?>
<?php 
	include('connect.php');
	$role= $_GET["role"];
	$userid= $_GET["userid"];
//	$firstname= $_GET["firstname"];
//	$lastname= $_GET["lastname"];
	$returnValue= false;
	if($role == "Admin")
	{
		if(isset($userid) && ! empty($userid))
		{
			$sql_command= "SELECT * FROM ADMIN WHERE ADMINID = '" .$userid. "';";
			$result= $conn->query($sql_command);
		}
	}
	else if($role == "Faculty")
	{
		if(isset($userid) && ! empty($userid))
		{
			$sql_command= "SELECT * FROM FACULTY WHERE FACULTYID = '" .$userid. "';";
			$result= $conn->query($sql_command);
		}
	}
	else if($role == "Student")
	{
		if(isset($userid) && ! empty($userid))
		{
			$sql_command= "SELECT * FROM STUDENT WHERE STUDENTID = '" .$userid. "';";
			$result= $conn->query($sql_command);
		}
	}
	if(mysqli_fetch_array($result) > 0)
	{
		$_SESSION["temprole"]= $role;
		$_SESSION["tempuserid"]= $userid;
		$returnValue= true;
	}
	echo $returnValue;
	mysqli_close($conn);
?>	