<?php session_start();
	include('connect.php');
	if($_SESSION["temprole"] == "Admin")
	{
		$sql_command= "INSERT INTO ADMIN(PASSWORD, ROLE, FIRSTNAME, LASTNAME, ADDRESS, CITY, ST, ZIPCODE, PHONE, EMAIL) VALUES ".
		"('".$_SESSION["temppassword"]."','" .$_SESSION["temprole"]. "','" .$_SESSION["tempfirstname"]. "','" .$_SESSION["templastname"]. 
		"','" .$_SESSION["tempaddress"]. "','" .$_SESSION["tempcity"]. "','" .$_SESSION["tempstate"]. "','" .$_SESSION["tempzipcode"]. 
		"','" .$_SESSION["tempphone"]. "','" .$_SESSION["tempemail"]. "');";
		$result= $conn->query($sql_command);
		$sql_command2= "SELECT * FROM ADMIN WHERE FIRSTNAME = '" .$_SESSION["tempfirstname"]. "' AND LASTNAME = '" .$_SESSION["templastname"]. 
		"' AND ADDRESS = '" .$_SESSION["tempaddress"]. "' AND CITY = '" .$_SESSION["tempcity"]. "' AND ST = '" .$_SESSION["tempstate"]. 
		"' AND ZIPCODE = '" .$_SESSION["tempzipcode"]. "';";
		$result2= $conn->query($sql_command2);
		$row= mysqli_fetch_array($result2);
		$_SESSION["tempuserid"]= $row['ADMINID'];
		$returnValue= "New administrator profile created successfully:" . 
		"<br>User ID: " .$row["ADMINID"].
		"<br>Password: " .$row["PASSWORD"].
		"<br>Role: " .$row["ROLE"].
		"<br>First Name: " .$row["FIRSTNAME"].
		"<br>Last Name: " .$row["LASTNAME"].
		"<br>Address: " .$row["ADDRESS"].
		"<br>City: " .$row["CITY"].
		"<br>State: " .$row["ST"].
		"<br>Zip Code: " .$row["ZIPCODE"].
		"<br>Phone Number: " .$row["PHONE"].
		"<br>E-Mail Address: " .$row["EMAIL"];
	}
	else if($_SESSION["temprole"] == "Faculty")
	{
		$sql_command= "INSERT INTO FACULTY(PASSWORD, ROLE, FIRSTNAME, LASTNAME, ADDRESS, CITY, ST, ZIPCODE, PHONE, EMAIL, BIO) VALUES ".
		"('".$_SESSION["temppassword"]."','" .$_SESSION["temprole"]. "','" .$_SESSION["tempfirstname"]. "','" .$_SESSION["templastname"]. 
		"','" .$_SESSION["tempaddress"]. "','" .$_SESSION["tempcity"]. "','" .$_SESSION["tempstate"]. "','" .$_SESSION["tempzipcode"]. 
		"','" .$_SESSION["tempphone"]. "','" .$_SESSION["tempemail"]. "','" .$_SESSION["tempbio"]. "');";
		$result= $conn->query($sql_command);
		$sql_command2= "SELECT * FROM FACULTY WHERE FIRSTNAME = '" .$_SESSION["tempfirstname"]. "' AND LASTNAME = '" .$_SESSION["templastname"]. 
		"' AND ADDRESS = '" .$_SESSION["tempaddress"]. "' AND CITY = '" .$_SESSION["tempcity"]. "' AND ST = '" .$_SESSION["tempstate"]. 
		"' AND ZIPCODE = '" .$_SESSION["tempzipcode"]. "';";
		$result2= $conn->query($sql_command2);
		$row= mysqli_fetch_array($result2);
		$_SESSION["tempuserid"]= $row['FACULTYID'];
		$returnValue= "New faculty profile created successfully:" . 
		"<br>User ID: " .$row["FACULTYID"].
		"<br>Password: " .$row["PASSWORD"].
		"<br>Role: " .$row["ROLE"].
		"<br>First Name: " .$row["FIRSTNAME"].
		"<br>Last Name: " .$row["LASTNAME"].
		"<br>Address: " .$row["ADDRESS"].
		"<br>City: " .$row["CITY"].
		"<br>State: " .$row["ST"].
		"<br>Zip Code: " .$row["ZIPCODE"].
		"<br>Phone Number: " .$row["PHONE"].
		"<br>E-Mail Address: " .$row["EMAIL"].
		"<br>Bio Information: <br><pre>" .$row["BIO"]. "</pre>";
	}
	else if($_SESSION["temprole"] == "Student")
	{
		$sql_command= "INSERT INTO STUDENT(PASSWORD, ROLE, FIRSTNAME, LASTNAME, ADDRESS, CITY, ST, ZIPCODE, PHONE, EMAIL) VALUES ".
		"('".$_SESSION["temppassword"]."','" .$_SESSION["temprole"]. "','" .$_SESSION["tempfirstname"]. "','" .$_SESSION["templastname"]. 
		"','" .$_SESSION["tempaddress"]. "','" .$_SESSION["tempcity"]. "','" .$_SESSION["tempstate"]. "','" .$_SESSION["tempzipcode"]. 
		"','" .$_SESSION["tempphone"]. "','" .$_SESSION["tempemail"]. "');";
		$result= $conn->query($sql_command);
		$sql_command2= "SELECT * FROM STUDENT WHERE FIRSTNAME = '" .$_SESSION["tempfirstname"]. "' AND LASTNAME = '" .$_SESSION["templastname"]. 
		"' AND ADDRESS = '" .$_SESSION["tempaddress"]. "' AND CITY = '" .$_SESSION["tempcity"]. "' AND ST = '" .$_SESSION["tempstate"]. 
		"' AND ZIPCODE = '" .$_SESSION["tempzipcode"]. "';";
		$result2= $conn->query($sql_command2);
		$row= mysqli_fetch_array($result2);
		$_SESSION["tempuserid"]= $row['STUDENTID'];
		$returnValue= "New student profile created successfully:" . 
		"<br>User ID: " .$row["STUDENTID"].
		"<br>Password: " .$row["PASSWORD"].
		"<br>Role: " .$row["ROLE"].
		"<br>First Name: " .$row["FIRSTNAME"].
		"<br>Last Name: " .$row["LASTNAME"].
		"<br>Address: " .$row["ADDRESS"].
		"<br>City: " .$row["CITY"].
		"<br>State: " .$row["ST"].
		"<br>Zip Code: " .$row["ZIPCODE"].
		"<br>Phone Number: " .$row["PHONE"].
		"<br>E-Mail Address: " .$row["EMAIL"];
		}
	echo $returnValue;
	mysqli_close($conn);
?>