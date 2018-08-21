<?php session_start(); ?>
<?php 
		include('connect.php');
	$stateArray= array('AL', 'AK', 'AZ', 'AR', 'CA', 'CO', 'CT', 'DE', 'FL', 'GA', 'HI', 'ID', 'IL', 'IN', 'IA', 'KS', 'KY', 'LA', 'ME', 'MD', 'MA', 'MI', 'MN', 'MS', 'MO', 'MT', 'NE', 'NV', 'NH', 'NJ', 'NM', 'NY', 'NC', 'ND', 'OH', 'OK', 'OR', 'PA', 'RI', 'SC', 'SD', 'TN', 'TX', 'UT', 'VT', 'VA', 'WA', 'WV', 'WI', 'WY');
	$userid= $_SESSION['userid'];
	$password= "";
	$role= $_SESSION['role'];
	$firstname= "";
	$lastname= "";
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
	if($role == "Student")
	{
		if(isset($userid) && ! empty($userid))
		{
			$sql_command= "SELECT * FROM STUDENT WHERE STUDENTID = '" .$userid. "';";
			$result= $conn->query($sql_command);
		}
	}	
	if(mysqli_num_rows($result) > 0)
	{		
		while($row= mysqli_fetch_array($result))
		{
			$returnValue= "<table class='info-table' style= 'font-size:16pt;' >".
			"<thead><tr><th colspan='2' >Information</th></tr></thead>".
		
			"<tbody id= 'UpdateTbl'>"
			;
			$returnValue .= "<tr>";
			$returnValue .= "<td>User ID</td>";
			$returnValue .= "<td><input style= 'font-size:16pt; font-family:Century Gothic; background:#ccc; color:white;' type= 'text' name= 'userid2' id= 'userid2' class= 'update' value= '" . $row['STUDENTID'] . "' readonly></td>";
			$returnValue .= "</tr><tr><td>Password</td> <td>" . 
			"<input style= 'font-size:16pt;' type= 'text' name= 'password' id= 'password' class= 'update' value= '" . $row['PASSWORD'] . "'></td>";
			$returnValue .= "</tr><tr><td>Role</td>" ;
			$returnValue .= "<td><input style= 'font-size:16pt; font-family:Century Gothic; background:#ccc; color:white;' type= 'text' name= 'role2' id= 'role2' class= 'update' value= '" . $row['ROLE'] . "' readonly></td>";
			
			$returnValue .= "</tr><tr><td>Firest Name</td> <td>" . 
			"<input style= 'font-size:16pt; font-family:Century Gothic; background:#ccc; color:white;' type= 'text' name= 'firstname2' id= 'firstname2' class= 'update' value= '" . $row['FIRSTNAME'] . "' readonly></td>";
			$returnValue .= "</tr><tr><td>Last Name</td> <td>" .  
			"<input style= 'font-size:16pt; font-family:Century Gothic; background:#ccc; color:white;' type= 'text' name= 'lastname2' id= 'lastname2' class= 'update' value= '" . $row['LASTNAME'] . "' readonly></td>";
			$returnValue .= "</tr><tr><td>Address</td> <td>" . 
			"<input style= 'font-size:16pt;' type= 'text' name= 'address' id= 'address' class= 'update' value= '" . $row['ADDRESS'] . "'></td>";
			$returnValue .= "</tr><tr><td>City</td> <td>" . 
			"<input style= 'font-size:16pt;' type= 'text' name= 'city' id= 'city' class= 'update' value= '" . $row['CITY'] . "'></td>";
			
			$returnValue .= "</tr><tr><td>State</td><td>". "<select style= 'font-size:16pt;' name= 'state' id= 'state'>";
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
					
			$returnValue .= "</tr><tr><td>ZIP CODE</td> <td>" . 
			"<input style= 'font-size:16pt;' type= 'text' name= 'zipcode' id= 'zipcode' size= '5' maxlength= '5' class= 'update' value= '" . $row['ZIPCODE'] . "'></td>";
			if(empty($row['PHONE']))
			{
				$returnValue .= "</tr><tr><td>Phone</td> <td>" . 
				"(<input style= 'font-size:16pt;' type= 'text' name= 'areacode' id= 'areacode' class= 'update' size= '3' maxlength= '3'>)".
				"<input style= 'font-size:16pt;' type= 'text' name= 'phone1' id= 'phone1' class= 'update' size= '3' maxlength= '3'>-".
				"<input style= 'font-size:16pt;' type= 'text' name= 'phone2' id= 'phone2' class= 'update' size= '4' maxlength= '4'>".
				"</td>";
			}
			else
			{
				$temp= $row['PHONE'];
				$temp= substr($temp, 1);
				$tempArray= preg_split('/[)-]/', $temp);
				$returnValue .= "</tr><tr><td>Phone</td> <td>" . 
				"(<input style= 'font-size:16pt;' type= 'text' class= 'update' value= '$tempArray[0]' name= 'areacode' id= 'areacode' class= 'ac' size= '3' maxlength= '3'>)".
				"<input style= 'font-size:16pt;' type= 'text' class= 'update' value= '$tempArray[1]' name= 'phone1' id= 'phone1' class= 'p1' size= '3' maxlength= '3'>-".
				"<input style= 'font-size:16pt;' type= 'text' class= 'update' value= '$tempArray[2]' name= 'phone2' id= 'phone2' class= 'p2' size= '4' maxlength= '4'>".
				"</td>";
			}
			$returnValue .= "<tr><td>Email</td> <td>" . 
			"<input style= 'font-size:16pt;' type= 'text' name= 'email' id= 'email' class= 'update' value= '" . $row['EMAIL'] . "'></td>";
			$returnValue .= "</tr>";
			$returnValue .= "</tr><tr><td></td> <td>" . 
			"<input type= 'button' class='button' name= 'update' id= 'update' value= 'Update'></td>";
			$returnValue .= "</tr>";
			$returnValue .= "</tbody></table>";
		
		}
	}
	echo $returnValue;
	mysqli_close($conn);
?>	