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
	if(isset($_GET["bio"]))
	$bio= $_GET["bio"];
	$returnValue= false;
	
	
	if($password == "" || $firstname == "" || $lastname == "" || $address == "" || $city == "" || $state == "" || $zipcode == "" || $areacode == "" || $phone1 == "" || $phone2 == "" || $email == "")	//check mandatory fields	
	{
		$returnValue= "Please fill in all mandatory fields.";
		mysqli_close($conn);
	}
	
	
	else if( isset($bio) && $role == "Admin" && $bio != "")
	{
		$returnValue= "Administrators are not allowed to enter Bio Information.";
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
		if($role == $prevRole)
		{
			if($role == "Admin")
			{
				$sql_command= "UPDATE ADMIN SET ".
				"PASSWORD = '" .$password.
				"', ROLE = '" .$role.
				"', FIRSTNAME = '" .$firstname.
				"', LASTNAME = '" .$lastname.
				"', ADDRESS = '" .$address.
				"', CITY = '" .$city.
				"', ST = '" .$state.
				"', ZIPCODE = '" .$zipcode.
				"', PHONE = '" .$phone.
				"', EMAIL = '" .$email. 
				"' WHERE ADMINID = '" .$userid. "';";
				$result= $conn->query($sql_command);
			}
			else if($role == "Faculty")
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
			//	"', BIO = '" .$bio. 
				"' WHERE FACULTYID = '" .$userid. "';";
				$result= $conn->query($sql_command);
			}
			else if($role == "Student")
			{
				$sql_command= "UPDATE STUDENT SET ".
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
				"' WHERE STUDENTID = '" .$userid. "';";
				$result= $conn->query($sql_command);
			}
		}
		else
		{
			if($userid != $_SESSION["userid"]) //if entered userid != to current users userid
			{
				if($prevRole == "Admin")
				{
					$sql_command= "DELETE FROM ADMIN WHERE ADMINID = '" .$_SESSION["tempuserid"]. "';";		
					$result= $conn->query($sql_command);
				}
				else if($prevRole == "Faculty")
				{
					$sql_command= "UPDATE ENROLLMENTS SET STATUS= 'Canceled' WHERE FACULTYID = '" .$_SESSION["tempuserid"]. "' AND STATUS IN ('Enrolled','In Progress');";
					$result= $conn->query($sql_command);
					$sql_command2= "DELETE FROM CLASSES WHERE FACULTYID = '" .$_SESSION["tempuserid"]. "';";
					$result2= $conn->query($sql_command2);
					$sql_command3= "DELETE FROM FACULTY WHERE FACULTYID = '" .$_SESSION["tempuserid"]. "';";
					$result3= $conn->query($sql_command3);
				}
				else if($prevRole == "Student")
				{
					$sql_command=  "SELECT * FROM ENROLLMENTS WHERE STUDENTID = '" .$_SESSION["tempuserid"]. "';";
					$result= $conn->query($sql_command);
					
					while($row= mysqli_fetch_array($result))
					{
						$sql_command2= "SELECT * FROM CLASSES WHERE CLASSID = '" .$row["CLASSID"]. "';";
						$result2= $conn->query($sql_command2);
						
						while($row2= mysqli_fetch_array($result2))
						{
							$prevEnroll= intval($row2["ENROLLMENT"]);
							$currEnroll= $prevEnroll - 1;
							$sql_command3= "UPDATE CLASSES SET ENROLLMENT = " .$currEnroll. " WHERE CLASSID = " .$row["CLASSID"]. ";";
							$result3= $conn->query($sql_command3);
							$sql_command4= "DELETE FROM ENROLLMENTS WHERE ENROLLMENTID = '" .$row["ENROLLMENTID"]. "';";
							$result4= $conn->query($sql_command4);
						}
					}
					
					$sql_command5= "DELETE FROM STUDENT WHERE STUDENTID = '" .$_SESSION["tempuserid"]. "';";
					$result5= $conn->query($sql_command5);
				}
				
				if($role == "Admin")
				{
					$sql_command= "INSERT INTO ADMIN(ADMINID, PASSWORD, ROLE, FIRSTNAME, LASTNAME, ADDRESS, CITY, ST, ZIPCODE, PHONE, EMAIL) VALUES ".
					"('".$userid. "', '".$password."','" .$role. "','" .$firstname. "','" .$lastname. "','" .$address. "','" .$city. "','" .$state. 
					"','" .$zipcode. "','" .$phone. "','" .$email. "');";
					$result= $conn->query($sql_command);
				}
				else if($role == "Faculty")
				{
					$sql_command= "INSERT INTO FACULTY(FACULTYID, PASSWORD, ROLE, FIRSTNAME, LASTNAME, ADDRESS, CITY, ST, ZIPCODE, PHONE, EMAIL, BIO) VALUES ".
					"('".$userid. "', '".$password."','" .$role. "','" .$firstname. "','" .$lastname. "','" .$address. "','" .$city. "','" .$state. 
					"','" .$zipcode. "','" .$phone. "','" .$email. "','" .$bio. ");";
					$result= $conn->query($sql_command);
				}
				else if($role == "Student")
				{
					$sql_command= "INSERT INTO STUDENT(STUDENTID, PASSWORD, ROLE, FIRSTNAME, LASTNAME, ADDRESS, CITY, ST, ZIPCODE, PHONE, EMAIL) VALUES ".
					"('".$userid. "', '".$password."','" .$role. "','" .$firstname. "','" .$lastname. "','" .$address. "','" .$city. "','" .$state. 
					"','" .$zipcode. "','" .$phone. "','" .$email. "');";
					$result= $conn->query($sql_command);
				}
			}
			else
			{
				$returnValue= "Error. A user cannot change their own profile type. Please have another administrator perform this action.";
			}
		}
	}
	
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
	//	$_SESSION["tempbio"]= $bio;
		
		if($role == "Admin")
		{
			$returnValue= "Administrator profile updated successfully:" . 
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
			"<br>E-Mail Address: " .$email;
		}
		else if($role == "Faculty")
		{
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
			"<br>E-Mail Address: " .$email."</pre>";
//			"<br>Bio Information: <br><pre>" .$bio. 
		}
		else if($role == "Student")
		{
			$returnValue= "Student profile updated successfully:" . 
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
			"<br>E-Mail Address: " .$email;
		}
	}
	echo $returnValue;
	mysqli_close($conn);
?>
