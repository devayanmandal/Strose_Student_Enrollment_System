<?php session_start(); ?>
<?php
	include('connect.php');
	$userid= $_GET["userid"];
	$password= $_GET["password"];
	$role= $_GET["role"];
	if($role == "Admin")
	{
		$sql_command= "SELECT * FROM ADMIN WHERE ADMINID = " . $userid . " AND PASSWORD = '" . $password . "';";
		$result= $conn->query($sql_command);
	}
	else if($role == "Faculty")
	{
		$sql_command= "SELECT * FROM FACULTY WHERE FACULTYID = " . $userid . " AND PASSWORD = '" . $password . "';";
		$result= $conn->query($sql_command);
	}
	else if($role == "Student")
	{
		$sql_command= "SELECT * FROM STUDENT WHERE STUDENTID = " . $userid . " AND PASSWORD = '" . $password . "';";
		$result= $conn->query($sql_command);
	}
	if(mysqli_num_rows($result) > 0)
	{
		while($row= mysqli_fetch_array($result))
		{		
			$_SESSION['userid']= $userid;
			$_SESSION['password']= $password;
			$_SESSION['role']= $role;
			$_SESSION['firstname']= $row['FIRSTNAME'];
			$_SESSION['lastname']= $row['LASTNAME'];
			$_SESSION['address']= $row['ADDRESS'];
			$_SESSION['city']= $row['CITY'];
			$_SESSION['st']= $row['ST'];
			$_SESSION['zipcode']= $row['ZIPCODE'];
			$_SESSION['phone']= $row['PHONE'];
			$_SESSION['email']= $row['EMAIL'];
		}
	
		if($_SESSION['role'] == "Admin")
		{
			$returnValue= "Admin";
		}
		else if($_SESSION['role'] == "Faculty")
		{
			$returnValue = "Faculty";
		}
		else if($_SESSION['role'] == "Student")
		{
			$returnValue= "Student";
		}
	}
	else
	{
		$returnValue= "Incorrect Username, Password, or Account type entered.";
	}
	echo $returnValue;
	mysqli_close($conn);
?>