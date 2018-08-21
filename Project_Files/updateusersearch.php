<?php session_start(); ?>
<?php 
	include('connect.php');
	$stateArray= array('AL', 'AK', 'AZ', 'AR', 'CA', 'CO', 'CT', 'DE', 'FL', 'GA', 'HI', 'ID', 'IL', 'IN', 'IA', 'KS', 'KY', 'LA', 'ME', 'MD', 'MA', 'MI', 'MN', 'MS', 'MO', 'MT', 'NE', 'NV', 'NH', 'NJ', 'NM', 'NY', 'NC', 'ND', 'OH', 'OK', 'OR', 'PA', 'RI', 'SC', 'SD', 'TN', 'TX', 'UT', 'VT', 'VA', 'WA', 'WV', 'WI', 'WY');
	$userid= $_GET["userid"];
	$password= "";
	$role= $_GET["role"];
	$firstname= $_GET["firstname"];
	$lastname= $_GET["lastname"];
	$address= "";
	$city= "";
	$state= "";
	$zipcode= "";
	$areacode= "";
	$phone1= "";
	$phone2= "";
	$email= "";
	$bio= "";
	$returnValue= false;
	if($role == "Admin")
	{
		if(isset($userid) && ! empty($userid))
		{
			$sql_command= "SELECT * FROM ADMIN WHERE ADMINID = '" .$userid. "';";
			$result= $conn->query($sql_command);
		}
		else if((isset($firstname) && ! empty($firstname)) && (isset($lastname) && ! empty($lastname)))
		{
			$sql_command= "SELECT * FROM ADMIN WHERE FIRSTNAME = '" .$firstname. "' AND LASTNAME = '" .$lastname. "';";
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
		else if((isset($firstname) && ! empty($firstname)) && (isset($lastname) && ! empty($lastname)))
		{
			$sql_command= "SELECT * FROM FACULTY WHERE FIRSTNAME = '" .$firstname. "' AND LASTNAME = '" .$lastname. "';";
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
		else if((isset($firstname) && ! empty($firstname)) && (isset($lastname) && ! empty($lastname)))
		{
			$sql_command= "SELECT * FROM STUDENT WHERE FIRSTNAME = '" .$firstname. "' AND LASTNAME = '" .$lastname. "';";
			$result= $conn->query($sql_command);
		}
	}	
	
	if(mysqli_num_rows($result) > 0)
	{		
		$row= mysqli_fetch_array($result);
		
			$returnValue= "<table class='info-table' >".
			"<thead><tr><th colspan='2'>Information</th>".
			/*"<th>Password</th><th>Role</th>".
			"<th>First Name</th><th>Last Name</th>".
			"<th>Address</th><th>City</th><th>State</th>".
			"<th>Zip Code</th><th>Phone Number</th>".
			"<th>E-Mail Address</th>".*/
			
			"</tr></thead><tbody id= 'UpdateTbl'>";
			$returnValue .= "<tr>";
			$returnValue .= "<td>ID</td>";
			if($role == "Admin")
				$returnValue .= "<td>" . 
			"<input  style= 'font-size:16pt; font-family:Century Gothic; background: #ccc; color: white;' type= 'text' name= 'userid2' id= 'userid2' class= 'update' value= '" . $row['ADMINID'] . "' readonly></td>";
			else if($role == "Faculty")
				$returnValue .= "<td>" . 
			"<input style= 'font-size:16pt; font-family:Century Gothic; background: #ccc; color: white;' type= 'text' name= 'userid2' id= 'userid2' class= 'update' value= '" . $row['FACULTYID'] . "' readonly></td>";
			else if($role == "Student")
				$returnValue .= "<td>" . 
			"<input style= 'font-size:16pt; font-family:Century Gothic; background: #ccc; color: white;' type= 'text' name= 'userid2' id= 'userid2' class= 'update' value= '" . $row['STUDENTID'] . "'readonly></td>";
			
			$returnValue .= "</tr><tr><td>Password</td> <td>" .  
			"<input style= 'font-size:16pt; font-family:Arial;' type= 'text' name= 'password' id= 'password' class= 'update' value= '" . $row['PASSWORD'] . "'></td>";
			$returnValue .= "</tr><tr><td>Role</td>" ;  
			if($row['ROLE'] == "Admin")
			{
				$returnValue .= "<td>".
				"<select style= 'font-size:16pt; font-family:Arial;' name= 'role2' id= 'role2' class= 'update'>".
					"<option value= 'Admin' selected>Administrator</option>".
					"<option value= 'Faculty'>Faculty</option>".
					"<option value= 'Student'>Student</option>".
				"</select>".
				"</td>";
			}
			else if($row['ROLE'] == "Faculty")
			{
				$returnValue .= "<td>".
				"<select style= 'font-size:16pt; font-family:Arial;' name= 'role2' id= 'role2' class= 'update'>".
					"<option value= 'Admin'>Administrator</option>".
					"<option value= 'Faculty' selected>Faculty</option>".
					"<option value= 'Student'>Student</option>".
				"</select>".
				"</td>";
			}
			else if($row['ROLE'] == "Student")
			{
				$returnValue .= "<td>".
				"<select style= 'font-size:16pt; font-family:Arial;' name= 'role2' id= 'role2' class= 'update'>".
					"<option value= 'Admin'>Administrator</option>".
					"<option value= 'Faculty'>Faculty</option>".
					"<option value= 'Student' selected>Student</option>".
				"</select>".
				"</td>";
			}
				$returnValue .= "</tr><tr><td>First Name</td>" ;
			$returnValue .= "<td>" . 
			"<input style= 'font-size:16pt; font-family:Arial;' type= 'text' name= 'firstname2' id= 'firstname2' class= 'update' value= '" . $row['FIRSTNAME'] . "'></td>";
				$returnValue .= "</tr><tr><td>Last Name</td>" ; 
			$returnValue .= "<td>" . 
			"<input style= 'font-size:16pt; font-family:Arial;' type= 'text' name= 'lastname2' id= 'lastname2' class= 'update' value= '" . $row['LASTNAME'] . "'></td>";
				$returnValue .= "</tr><tr><td>Address</td> <td>" .  
			"<input style= 'font-size:16pt; font-family:Arial;' type= 'text' name= 'address' id= 'address' class= 'update' value= '" . $row['ADDRESS'] . "'></td>";
			$returnValue .= "</tr><tr><td>City</td> <td>" .  
			"<input style= 'font-size:16pt; font-family:Arial;' type= 'text' name= 'city' id= 'city' class= 'update' value= '" . $row['CITY'] . "'></td>";
				$returnValue .= "</tr><tr><td>State</td>" ; 
			$returnValue .= "<td>". "<select style= 'font-size:16pt; font-family:Arial;' name= 'state' id= 'state'>";
			for($i=0; $i<50; $i++)
			{
				if($stateArray[$i] == $row['ST'])
				{
					$returnValue .= "<option value= '" .$stateArray[$i]. "' selected>" .$stateArray[$i]. "</option>";
				}
				else
				{
					$returnValue .= "<option value= '" .$stateArray[$i]. "'>" .$stateArray[$i]. "</option>";
				}
			}
			$returnValue .= "</select></td>";
					
				$returnValue .= "</tr><tr><td>ZIP Code</td> <td>" .  
			"<input style= 'font-size:16pt; font-family:Arial;' type= 'text' name= 'zipcode' id= 'zipcode' size= '5' maxlength= '5' class= 'update' value= '" . $row['ZIPCODE'] . "'></td>";
				$returnValue .= "</tr><tr><td>Phone</td>" ; 
			if(empty($row['PHONE']))
			{
				$returnValue .= "<td>".
				"(<input style= 'font-size:16pt; font-family:Arial;' type= 'text' name= 'areacode' id= 'areacode' class= 'update' size= '3' maxlength= '3'>)".
				"<input style= 'font-size:16pt; font-family:Arial;' type= 'text' name= 'phone1' id= 'phone1' class= 'update' size= '3' maxlength= '3'>-".
				"<input style= 'font-size:16pt; font-family:Arial;' type= 'text' name= 'phone2' id= 'phone2' class= 'update' size= '4' maxlength= '4'>".
				"</td>";
			}
			else
			{
				$temp= $row['PHONE'];
				$temp= substr($temp, 1);
				$tempArray= preg_split('/[)-]/', $temp);
				$returnValue .= "<td>".
				"(<input style= 'font-size:16pt; font-family:Arial;' type= 'text' class= 'update' value= '$tempArray[0]' name= 'areacode' id= 'areacode' class= 'ac' size= '3' maxlength= '3'>)".
				"<input style= 'font-size:16pt; font-family:Arial;' type= 'text' class= 'update' value= '$tempArray[1]' name= 'phone1' id= 'phone1' class= 'p1' size= '3' maxlength= '3'>-".
				"<input style= 'font-size:16pt; font-family:Arial;' type= 'text' class= 'update' value= '$tempArray[2]' name= 'phone2' id= 'phone2' class= 'p2' size= '4' maxlength= '4'>".
				"</td>";
			}
			
			$returnValue .= "</tr><tr><td>Email</td> <td>" .  
			"<input style= 'font-size:16pt; font-family:Arial;' type= 'text' name= 'email' id= 'email' class= 'update' value= '".$row['EMAIL']. "'></td></tr>";
				/*if(isset($row['BIO'])
				{
				$returnValue .= "<tr><td>Bio Information:</td> <td><textarea style= 'font-size:16pt; font-family:Arial;' name= 'bio' id= 'bio' wrap= 'hard' maxlength= '280' rows= '10' cols= '50'>".$row['BIO']."</textarea></td></tr>";
				} */
			$returnValue .= "<tr><td></td> <td><input class='button' type= 'button' name= 'update' id= 'update' value= 'Update'></td>" ; 	
			$returnValue .= "</tr>";
			$returnValue .= "</tbody></table>";
		
		$_SESSION["tempuserid"]= $userid;
		$_SESSION["temprole"]= $role;
		$_SESSION["tempfirstname"]= $firstname;
		$_SESSION["templastname"]= $lastname;
	}
	echo $returnValue;
	mysqli_close($conn);
?>	