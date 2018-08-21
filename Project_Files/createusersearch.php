<?php session_start(); ?>
<?php
	include('connect.php');
	$returnValue= false;
	$password= $_GET["password"];
	$role= $_GET["role"];
	$firstname= $_GET["firstname"];
	$lastname= $_GET["lastname"];
	$address= $_GET["address"];
	$city= $_GET["city"];
	$state= $_GET["state"];
	$zipcode= $_GET["zipcode"];
	$phone= "";
	$areacode= $_GET["areacode"];
	$phone1= $_GET["phone1"];
	$phone2= $_GET["phone2"];
	$email= $_GET["email"];	
	$bio= $_GET["bio"];
	
	if($password == "" || $firstname == "" || $lastname == "" || $address == "" || $city == "" || $state == "" || $zipcode == "" || $areacode == "" || $phone1 == "" || $phone2 == "" || $email == "")	//check mandatory fields	
	{
		$returnValue= "Please fill in all mandatory fields.";
		echo $returnValue;
		mysqli_close($conn);
	}
	else if($role == "Faculty" && $bio == "")
	{
		$returnValue= "Please enter Bio Information for Faculty member.";
		echo $returnValue;
		mysqli_close($conn);
	}
	else if($role == "Student" && $bio != "")
	{
		$returnValue= "Students are not allowed to enter Bio Information.";
		echo $returnValue;
		mysqli_close($conn);
	}
	else if($role == "Admin" && $bio != "")
	{
		$returnValue= "Administrators are not allowed to enter Bio Information.";
		echo $returnValue;
		mysqli_close($conn);
	}
	else if(preg_match('/^[A-Z]/', $firstname) == 0)	//check firstname capital as it is used in user search
	{
		$returnValue= "Please make sure the First Name is capitalized.<br>";
		echo $returnValue;
		mysqli_close($conn);
	}
	else if(preg_match('/^[A-Z]/', $lastname) == 0)	//check lastname capital as it is used in user search.
	{
		$returnValue= "Please make sure the Last Name is capitalized.<br>";
		echo $returnValue;
		mysqli_close($conn);
	}
	else if(preg_match('/^[A-Z]/', $city) == 0)	//check capitalized city
	{
		$returnValue= "Please make sure the City is capitalized.<br>";
		echo $returnValue;
		mysqli_close($conn);
	}
	else if(preg_match('/[0-9]{5}/', $zipcode) == 0)	//check valid 5 digit zip code
	{
		$returnValue= "Please enter a valid Zip Code";
		echo $returnValue;
		mysqli_close($conn);
	}	
	else if(preg_match('/[0-9]{3}/', $areacode) == 0)	//check area code
	{
		$returnValue= "Please enter a valid Phone Number.";
		echo $returnValue;
		mysqli_close($conn);
	}
	else if(preg_match('/[0-9]{3}/',$phone1) == 0)	//check phone1
	{
		$returnValue= "Please enter a valid Phone Number.";
		echo $returnValue;
		mysqli_close($conn);	
	}
	else if(preg_match('/[0-9]{4}/', $phone2) == 0)	//check phone2
	{	
		$returnValue= "Please enter a valid Phone Number.";
		echo $returnValue;
		mysqli_close($conn);
	}
	else
	{	
		if($role == "Admin")
		{
			$sql_command= "SELECT * FROM ADMIN WHERE FIRSTNAME = '" . $firstname . "' AND LASTNAME = '" . $lastname . "';";
			$result= $conn->query($sql_command);
		}
		else if($role == "Faculty")
		{
			$sql_command= "SELECT * FROM FACULTY WHERE FIRSTNAME = '" . $firstname . "' AND LASTNAME = '" . $lastname . "';";
			$result= $conn->query($sql_command);
		}
		else if($role == "Student")
		{
			$sql_command= "SELECT * FROM STUDENT WHERE FIRSTNAME = '" . $firstname . "' AND LASTNAME = '" . $lastname . "';";
			$result= $conn->query($sql_command);
		}
		
		if(mysqli_fetch_array($result)> 0)	//if duplicate user found return the value true
		{
			$returnValue= true;
		}
		else	//if not found, return the value false
		{
			$phone= "(" . $areacode . ")" . $phone1 . "-" . $phone2;
			$_SESSION["temppassword"]= $password;
			$_SESSION["temprole"]= $role;
			$_SESSION["tempfirstname"]= $firstname;
			$_SESSION["templastname"]= $lastname;
			$_SESSION["tempaddress"]= $address;
			$_SESSION["tempcity"]= $city;
			$_SESSION["tempstate"]= $state;
			$_SESSION["tempzipcode"]= $zipcode;
			$_SESSION["tempphone"]= $phone;
			$_SESSION["tempemail"]= $email;
			$_SESSION["tempbio"]= $bio;
		}
		echo $returnValue;
		mysqli_close($conn);
	}
?>
