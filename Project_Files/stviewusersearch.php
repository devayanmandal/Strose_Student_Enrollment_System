<?php session_start(); ?>
<?php 
	include('connect.php');
	$role= $_GET["role"];
	$userid= $_GET["userid"];
	$firstname= $_GET["firstname"];
	$lastname= $_GET["lastname"];
	$returnValue= false;
	if($role == "Faculty")
	{
		if(isset($userid) && ! empty($userid))
		{
			$sql_command= "SELECT * FROM FACULTY WHERE FACULTYID LIKE '" .$userid. "%';";
			$result= $conn->query($sql_command);
		}
		else if((isset($firstname) && ! empty($firstname)) || (isset($lastname) && ! empty($lastname)))
		{
			$sql_command= "SELECT * FROM FACULTY WHERE FIRSTNAME LIKE '" .$firstname. "%' AND LASTNAME LIKE '" .$lastname. "%';";
			$result= $conn->query($sql_command);
		}
	}
	else if($role == "Student")
	{
		if(isset($userid) && ! empty($userid))
		{
			$sql_command= "SELECT * FROM STUDENT WHERE STUDENTID LIKE '" .$userid. "%';";
			$result= $conn->query($sql_command);
		}
		else if((isset($firstname) && ! empty($firstname)) || (isset($lastname) && ! empty($lastname)))
		{
			$sql_command= "SELECT * FROM STUDENT WHERE FIRSTNAME LIKE '" .$firstname. "%' AND LASTNAME LIKE '" .$lastname. "%';";
			$result= $conn->query($sql_command);
		}
	}
	if(mysqli_fetch_array($result) > 0)
	{
		$_SESSION["temprole"]= $role;
		$_SESSION["tempuserid"]= $userid;
		$_SESSION["tempfirstname"]= $firstname;
		$_SESSION["templastname"]= $lastname;
		$returnValue= true;
	}
	echo $returnValue;
	mysqli_close($conn);
?>	