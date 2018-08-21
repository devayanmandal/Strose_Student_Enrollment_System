<?php session_start();
include('connect.php');
	if($_SESSION["temprole"] == "Faculty")
	{
		if(isset($_SESSION["tempuserid"]) && ! empty($_SESSION["tempuserid"]))
		{
			$sql_command= "SELECT * FROM FACULTY WHERE FACULTYID LIKE '" .$_SESSION["tempuserid"]. "%';";
			$result= $conn->query($sql_command);
		}
		else if((isset($_SESSION["tempfirstname"]) && ! empty($_SESSION["tempfirstname"])) || (isset($_SESSION["templastname"]) && ! empty($_SESSION["templastname"])))
		{
			$sql_command= "SELECT * FROM FACULTY WHERE FIRSTNAME LIKE '" .$_SESSION["tempfirstname"]. "%' AND LASTNAME LIKE '" .$_SESSION["templastname"]. "%';";
			$result= $conn->query($sql_command);
		}
	}
	else if($_SESSION["temprole"] == "Student")
	{
		if(isset($_SESSION["tempuserid"]) && ! empty($_SESSION["tempuserid"]))
		{
			$sql_command= "SELECT * FROM STUDENT WHERE STUDENTID LIKE '" .$_SESSION["tempuserid"]. "%';";
			$result= $conn->query($sql_command);
		}
		else if((isset($_SESSION["tempfirstname"]) && ! empty($_SESSION["tempfirstname"])) || (isset($_SESSION["templastname"]) && ! empty($_SESSION["templastname"])))
		{
			$sql_command= "SELECT * FROM STUDENT WHERE FIRSTNAME LIKE '" .$_SESSION["tempfirstname"]. "%' AND LASTNAME LIKE '" .$_SESSION["templastname"]. "%';";
			$result= $conn->query($sql_command);
		}
	}
	$returnValue= "<table style= 'font-size:16pt;' id='t01'><thead><tr><th>User ID</th><th>Role</th><th>First Name</th><th>Last Name</th><th>Phone Number</th><th>E-Mail Address</th><th></th></tr></thead><tbody>";
	while($row= mysqli_fetch_array($result))
	{
		if($_SESSION["temprole"] == "Faculty")
			$returnValue .= "<td>" . $row['FACULTYID'] . "</td>";
		else if($_SESSION["temprole"] == "Student")
			$returnValue .= "<td>" . $row['STUDENTID'] . "</td>";
		$returnValue .= "<td>" . $row['ROLE'] . "</td>";
		$returnValue .= "<td>" . $row['FIRSTNAME'] . "</td>";
		$returnValue .= "<td>" . $row['LASTNAME'] . "</td>";
		$returnValue .= "<td>" . $row['PHONE'] . "</td>";
		$returnValue .= "<td>" . $row['EMAIL'] . "</td>";
		if($_SESSION["temprole"] == "Faculty")
			$returnValue .= "<td>" . "<input type= 'button' name= 'bio' id= 'bio' value= 'View Bio'>" . "</td>";
		$returnValue .= "</tr>";
	}
	$returnValue .= "</tbody></table>";
	echo $returnValue;
	mysqli_close($conn);
?>