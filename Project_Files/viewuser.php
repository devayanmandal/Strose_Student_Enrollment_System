<?php session_start();
	include('connect.php');
	if($_SESSION["temprole"] == "Admin")
	{
		if(isset($_SESSION["tempuserid"]) && ! empty($_SESSION["tempuserid"]))
		{
			$sql_command= "SELECT * FROM ADMIN WHERE ADMINID LIKE '" .$_SESSION["tempuserid"]. "%';";
			$result= $conn->query($sql_command);
		}
		else if((isset($_SESSION["tempfirstname"]) && ! empty($_SESSION["tempfirstname"])) || (isset($_SESSION["templastname"]) && ! empty($_SESSION["templastname"])))
		{
			$sql_command= "SELECT * FROM ADMIN WHERE FIRSTNAME LIKE '" .$_SESSION["tempfirstname"]. "%' AND LASTNAME LIKE '" .$_SESSION["templastname"]. "%';";
			$result= $conn->query($sql_command);
		}
	}
	else if($_SESSION["temprole"] == "Faculty")
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
	$returnValue= "<table id='t01' class='info-table'><thead><tr><th>User ID</th><th>Password</th><th>Role</th><th>First Name</th><th>Last Name</th><th>Address</th><th>City</th><th>State</th><th>Zip Code</th><th>Phone Number</th><th>E-Mail Address</th></tr></thead><tbody>";
	while($row= mysqli_fetch_array($result))
	{
		$returnValue .= "<tr>";
		if($_SESSION["temprole"] == "Admin")
			$returnValue .= "<td>" . $row['ADMINID'] . "</td>";
		else if($_SESSION["temprole"] == "Faculty")
			$returnValue .= "<td>" . $row['FACULTYID'] . "</td>";
		else if($_SESSION["temprole"] == "Student")
			$returnValue .= "<td>" . $row['STUDENTID'] . "</td>";
		$returnValue .= "<td>" . $row['PASSWORD'] . "</td>";
		$returnValue .= "<td>" . $row['ROLE'] . "</td>";
		$returnValue .= "<td>" . $row['FIRSTNAME'] . "</td>";
		$returnValue .= "<td>" . $row['LASTNAME'] . "</td>";
		$returnValue .= "<td>" . $row['ADDRESS'] . "</td>";
		$returnValue .= "<td>" . $row['CITY'] . "</td>";
		$returnValue .= "<td>" . $row['ST'] . "</td>";
		$returnValue .= "<td>" . $row['ZIPCODE'] . "</td>";
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