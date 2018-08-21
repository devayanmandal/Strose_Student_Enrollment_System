<?php session_start(); ?>
<?php
	include('connect.php');
	$userid= $_GET["userid2"];
	$password= $_GET["password"];
	$prevRole= $_SESSION["temprole"];
	$role= $_GET["role2"];
	$firstname= $_GET["firstname2"];
	$lastname= $_GET["lastname2"];
	$address= $_GET["address"];
	$city= $_GET["city"];
	$state= $_GET["state"];
	$zipcode= $_GET["zipcode"];
	$areacode= $_GET["areacode"];
	$phone1= $_GET["phone1"];
	$phone2= $_GET["phone2"];
	$phone= "(" . $areacode . ")" . $phone1 . "-" . $phone2;
	$email= $_GET["email"];
	$bio= $_GET["bio"];
	$returnValue= false;
	
	
	if($password == "" || $firstname == "" || $lastname == "" || $address == "" || $city == "" || $state == "" || $zipcode == "" || $areacode == "" || $phone1 == "" || $phone2 == "" || $email == "")	//check mandatory fields	
	{
		$returnValue= "Please fill in all mandatory fields.";
		mysqli_close($conn);
	}
	else if($role == "Faculty" && $bio == "")
	{
		$returnValue= "Please enter Bio Information for Faculty member.";
		mysqli_close($conn);
	}
	else if(preg_match('/^[A-Z]/', $firstname) == 0)	//check firstname capital as it is used in user search
	{
		$returnValue= "Please make sure the First Name is capitalized.<br>";
		mysqli_close($conn);
	}
	else if(preg_match('/^[A-Z]/', $lastname) == 0)	//check lastname capital as it is used in user search.
	{
		$returnValue= "Please make sure the Last Name is capitalized.<br>";
		mysqli_close($conn);
	}
	else if(preg_match('/^[A-Z]/', $city) == 0)	//check capitalized city
	{
		$returnValue= "Please make sure the City is capitalized.<br>";
		mysqli_close($conn);
	}
	else if(preg_match('/[0-9]{5}/', $zipcode) == 0)	//check valid 5 digit zip code
	{
		$returnValue= "Please enter a valid Zip Code";
		mysqli_close($conn);
	}	
	else if(preg_match('/[0-9]{3}/', $areacode) == 0)	//check area code
	{
		$returnValue= "Please enter a valid Area Code for the Phone Number.";
		mysqli_close($conn);
	}
	else if(preg_match('/[0-9]{3}/',$phone1) == 0)	//check phone1
	{
		$returnValue= "Please enter a valid first Prefix for the Phone Number.";
		mysqli_close($conn);	
	}
	else if(preg_match('/[0-9]{4}/', $phone2) == 0)	//check phone2
	{	
		$returnValue= "Please enter a valid Line Number for Phone Number.";
		mysqli_close($conn);
	}
	else
	{
		$sql_command= "UPDATE FACULTY SET ".
		"PASSWORD = '" .$password.
		"', ROLE= '" .$role.
		"', FIRSTNAME = '" .$firstname.
		"', LASTNAME = '" .$lastname.
		"', ADDRESS = '" .$address.
		"', CITY = '" .$city.
		"', ST = '" .$state.
		"', ZIPCODE = '" .$zipcode.
		"', PHONE = '" .$phone.
		"', EMAIL = '" .$email. 
		"', BIO = '" .$bio. 
		"' WHERE FACULTYID = '" .$userid. "';";
		$result= $conn->query($sql_command);
		
		if(mysqli_affected_rows($conn) > 0)
		{
			$_SESSION["tempuserid"]= $userid;
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
			
			
			$returnValue= "Faculty profile updated successfully:" . 
			"<br>User ID: " .$userid.
			"<br>Password: " .$password.
			"<br>Role: " .$role.
			"<br>First Name: " .$firstname.
			"<br>Last Name: " .$lastname.
			"<br>Address: " .$address.
			"<br>City: " .$city.
			"<br>State: " .$state.
			"<br>Zip Code: " .$zipcode.
			"<br>Phone Number: " .$phone.
			"<br>E-Mail Address: " .$email.
			"<br>Bio Information: <br><pre>" .$bio. "</pre>";
		}
	}
	echo $returnValue;
	mysqli_close($conn);
?>
