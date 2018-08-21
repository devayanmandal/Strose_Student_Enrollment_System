<?php session_start(); ?>
<?php 
	include('connect.php');
	$classid= $_GET["classid"];
	$classcode= $_GET["classcode"];
	$sunday= "No";
	$monday= "No";
	$tuesday= "No";
	$wednesday= "No";
	$thursday= "No";
	$friday= "No";
	$saturday= "No";
	$returnValue= false;
	
	if(isset($classid) && ! empty($classid))
	{
		$sql_command= "SELECT * FROM CLASSES WHERE CLASSID = '" .$classid. "';";			
		$result= $conn->query($sql_command);
	}
	else if(isset($classcode) && ! empty($classcode))
	{
		$sql_command= "SELECT * FROM CLASSES WHERE CLASSCODE = '" .$classcode. "';";
		$result= $conn->query($sql_command);
	}
	
	if(mysqli_num_rows($result) > 0)
	{		
		while($row= mysqli_fetch_array($result))
		{
			$returnValue= "<table class='info-table' ><thead><tr><th colspan='2'>Information</th>".
			
		//	<tr><th>Class ID</th><th>Class Code</th><th>Class Name</th><th>Section</th><th>Enrollment</th><th>Max Enrollment</th><th>Status</th><th>Location</th><th>Days</th><th>Start Time</th><th>End Time</th><th>Professor</th></tr>
			
			"</tr></thead><tbody id= 'UpdateTbl'>";
			$returnValue .= "<tr>";
			$returnValue .= "<td>Class ID</td>";
			
			$returnValue .= "<td>" . "<input style= 'font-size:16pt; font-family:Century Gothic; background:#ccc; color:white;' type= 'text' name= 'classid2' id= 'classid2' value= '" . $row['CLASSID'] . "' readonly></td>";
			
			$returnValue .= "</tr><tr><td>Class Code</td>";
			$returnValue .= "<td>" . "<input style= 'font-size:16pt; font-family:Century Gothic; background:#ccc; color:white;' type= 'text' name= 'classcode' id= 'classcode' value= '" . $row['CLASSCODE'] . "' readonly></td>";
			$returnValue .= "</tr><tr><td>Class Name</td>";
			$returnValue .= "<td>" . "<input style= 'font-size:16pt; font-family:Arial; width:500px;' type= 'text' name= 'classname' id= 'classname' value= '" . $row['CLASSNAME'] . "'></td>";
			$returnValue .= "</tr><tr><td>Section</td>";
			$returnValue .= "<td>" . "<input style= 'font-size:16pt; font-family:Century Gothic; background:#ccc; color:white;' type= 'text' name= 'classsection' id= 'classsection' value= '" . $row['SEC'] . "' readonly></td>";
			$returnValue .= "</tr><tr><td>Enrollment</td>";
			$returnValue .= "<td>" . "<input style= 'font-size:16pt; font-family:Century Gothic; background:#ccc; color:white;' type= 'text' name= 'enrollment' id= 'enrollment' value= '" . $row['ENROLLMENT'] . "' readonly></td>";
			$returnValue .= "</tr><tr><td>Class Max Enrollment</td>";
			$returnValue .= "<td>" . "<input style= 'font-size:16pt; font-family:Arial;' type= 'text' name= 'maxenrollment' id= 'maxenrollment' value= '" . $row['MAXENROLLMENT'] . "'></td>";
			$returnValue .= "</tr><tr><td>Status</td>";
			if($row['STATUS'] == "Open")
			{
				$returnValue .= "<td><select style= 'font-size:16pt; font-family:Arial;' name= 'status' id= 'status'><option value= 'Open' selected>Open</option><option value= 'Closed'>Closed</option></select></td>";
			}
			else if($row['STATUS'] == "Closed")
			{
				$returnValue .= "<td><select style= 'font-size:16pt; font-family:Arial;' name= 'status' id= 'status'><option value= 'Open'>Open</option><option value= 'Closed' selected>Closed</option></select></td>";
			}
			$returnValue .= "</tr><tr><td>Class Location</td>";
			$_SESSION["tempstatus"]= $row["STATUS"];
			$returnValue .= "<td>" . "<input style= 'font-size:16pt; font-family:Arial;' type= 'text' name= 'location' id= 'location' value= '" . $row['LOCATION'] . "'></td>";
			$returnValue .= "</tr><tr><td>Days</td>";
			$temp= $row['DAYS'];
			$tempdayArray= preg_split('/[, ]/', $temp);
			for($i=0; $i< sizeof($tempdayArray); $i++)
			{
				if($tempdayArray[$i] == "Su")
				{
					$sunday = "Yes";
				}
				if($tempdayArray[$i] == "M")
				{
					$monday = "Yes";
				}
				if($tempdayArray[$i] == "Tu")
				{
					$tuesday = "Yes";
				}
				if($tempdayArray[$i] == "W")
				{
					$wednesday = "Yes";
				}
				if($tempdayArray[$i] == "Th")
				{
					$thursday = "Yes";
				}
				if($tempdayArray[$i] == "F")
				{
					$friday = "Yes";
				}
				if($tempdayArray[$i] == "Sa")
				{
					$saturday = "Yes";
				}
			}
			$returnValue .= "<td>";
			if($sunday == "Yes")
			{
				$returnValue .= "Su:<select style= 'font-size:16pt; font-family:Arial;' name= 'sunday' id= 'sunday'>".
						"<option value= 'No'>No</option>".
						"<option value= 'Yes' selected>Yes</option>".
					"</select>";
			}
			else
			{
				$returnValue .= "Su:<select style= 'font-size:16pt; font-family:Arial;' name= 'sunday' id= 'sunday'>".
						"<option value= 'No' selected>No</option>".
						"<option value= 'Yes'>Yes</option>".
					"</select>";
			}
			if($monday == "Yes")
			{	
				$returnValue .= "M:<select style= 'font-size:16pt; font-family:Arial;' name= 'monday' id= 'monday'>".
						"<option value= 'No'>No</option>".
						"<option value= 'Yes' selected>Yes</option>".
					"</select>";
			}
			else
			{
				$returnValue .= "M:<select style= 'font-size:16pt; font-family:Arial;' name= 'monday' id= 'monday'>".
						"<option value= 'No' selected>No</option>".
						"<option value= 'Yes'>Yes</option>".
					"</select>";
			}
			if($tuesday == "Yes")
			{
				$returnValue .= "Tu:<select style= 'font-size:16pt; font-family:Arial;' name= 'tuesday' id= 'tuesday'>".
						"<option value= 'No'>No</option>".
						"<option value= 'Yes' selected>Yes</option>".
					"</select>";
			}
			else
			{
				$returnValue .= "Tu:<select style= 'font-size:16pt; font-family:Arial;' name= 'tuesday' id= 'tuesday'>".
						"<option value= 'No' selected>No</option>".
						"<option value= 'Yes'>Yes</option>".
					"</select>";
			}
			if($wednesday == "Yes")
			{
				$returnValue .= "W:<select style= 'font-size:16pt; font-family:Arial;' name= 'wednesday' id= 'wednesday'>".
						"<option value= 'No'>No</option>".
						"<option value= 'Yes' selected>Yes</option>".
					"</select>";
			}
			else
			{
				$returnValue .= "W:<select style= 'font-size:16pt; font-family:Arial;' name= 'wednesday' id= 'wednesday'>".
						"<option value= 'No' selected>No</option>".
						"<option value= 'Yes'>Yes</option>".
					"</select>";
			}
			if($thursday == "Yes")
			{
				$returnValue .= "Th:<select style= 'font-size:16pt; font-family:Arial;' name= 'thursday' id= 'thursday'>".
						"<option value= 'No'>No</option>".
						"<option value= 'Yes' selected>Yes</option>".
					"</select>";
			}
			else
			{
				$returnValue .= "Th:<select style= 'font-size:16pt; font-family:Arial;' name= 'thursday' id= 'thursday'>".
						"<option value= 'No' selected>No</option>".
						"<option value= 'Yes'>Yes</option>".
					"</select>";
			}
			if($friday == "Yes")
			{
				$returnValue .= "F:<select style= 'font-size:16pt; font-family:Arial;' name= 'friday' id= 'friday'>".
						"<option value= 'No'>No</option>".
						"<option value= 'Yes' selected>Yes</option>".
					"</select>";
			}
			else
			{
				$returnValue .= "F:<select style= 'font-size:16pt; font-family:Arial;' name= 'friday' id= 'friday'>".
						"<option value= 'No' selected>No</option>".
						"<option value= 'Yes'>Yes</option>".
					"</select>";
			}
			if($saturday == "Yes")
			{
				$returnValue .= "Sa:<select style= 'font-size:16pt; font-family:Arial;' name= 'saturday' id= 'saturday'>".
						"<option value= 'No'>No</option>".
						"<option value= 'Yes' selected>Yes</option>".
					"</select>";
			}
			else
			{
				$returnValue .= "Sa:<select style= 'font-size:16pt; font-family:Arial;' name= 'saturday' id= 'saturday'>".
						"<option value= 'No' selected>No</option>".
						"<option value= 'Yes'>Yes</option>".
					"</select>";
			}
			$returnValue .= "</td>";
			$returnValue .= "</tr><tr><td>Start Time</td>";
			
			$temp= $row['STARTTIME'];
			$tempArray= preg_split('/[: ]/', $temp);
			$tempstarthour= $tempArray[0];
			$tempstarthourint= intval($tempstarthour);
			$tempstartmin= $tempArray[1];
			$tempstartminint= intval($tempstartmin);
			$tempstarttod= $tempArray[2];
			$returnValue .= "<td>" . "<select style= 'font-size:16pt; font-family:Arial;' name= 'starthour' id= 'starthour'>";
			if($tempstarthour == "12")
			{
				$returnValue .= "<option value= '12' selected>12</option>";
			}
			else
			{
				$returnValue .= "<option value= '12'>12</option>";
			}
			for($i= 1; $i<= 11; $i++)
			{
				if($i == $tempstarthourint)
				{
					if($i>= 1 && $i<= 9)
					{
						$returnValue .= "<option value= '0".$i."' selected>0".$i."</option>";
					}
					else
					{
						$returnValue .= "<option value= '".$i."' selected>".$i."</option>";
					}
				}
				else
				{
					if($i>= 1 && $i<= 9)
					{
						$returnValue .= "<option value= '0".$i."'>0".$i."</option>";
					}
					else
					{
						$returnValue .= "<option value= '".$i."'>".$i."</option>";
					}
				}
			}
			$returnValue .= "</select> : <select style= 'font-size:16pt; font-family:Arial;' name= 'startmin' id= 'startmin'>";
			for($i= 0; $i<= 59; $i++)
			{
				if($i == $tempstartminint)
				{
					if($i>= 0 && $i<= 9)
					{
						$returnValue .= "<option value= '0".$i."' selected>0".$i."</option>";
					}
					else
					{
						$returnValue .= "<option value= '".$i."' selected>".$i."</option>";
					}
				}
				else
				{
					if($i>= 0 && $i<= 9)
					{
						$returnValue .= "<option value= '0".$i."'>0".$i."</option>";
					}
					else
					{
						$returnValue .= "<option value= '".$i."'>".$i."</option>";
					}
				}
			}
			$returnValue .= "</select> <select style= 'font-size:16pt; font-family:Arial;' name= 'starttod' id= 'starttod'>";
			if($tempstarttod == "AM")
			{
				$returnValue .= "<option value= 'AM' selected>AM</option>".
								"<option value= 'PM'>PM</option>";
			}
			else
			{
				$returnValue .= "<option value= 'AM'>AM</option>".
								"<option value= 'PM' selected>PM</option>";
			}
			$returnValue .= "</select></td>";
			$returnValue .= "</tr><tr><td>End Time</td>";
			$temp= $row['ENDTIME'];
			$tempArray= preg_split('/[: ]/', $temp);
			$tempendhour= $tempArray[0];
			$tempendhourint= intval($tempendhour);
			$tempendmin= $tempArray[1];
			$tempendminint= intval($tempendmin);
			$tempendtod= $tempArray[2];
			$returnValue .= "<td>" . "<select style= 'font-size:16pt; font-family:Arial;' name= 'endhour' id= 'endhour'>";
			if($tempendhour == "12")
			{
				$returnValue .= "<option value= '12' selected>12</option>";
			}
			else
			{
				$returnValue .= "<option value= '12'>12</option>";
			}
			for($i= 1; $i<= 11; $i++)
			{
				if($i == $tempendhourint)
				{
					if($i>= 0 && $i<= 9)
					{
						$returnValue .= "<option value= '0".$i."' selected>0".$i."</option>";
					}
					else
					{
						$returnValue .= "<option value= '".$i."' selected>".$i."</option>";
					}
				}
				else
				{
					if($i>= 1 && $i<= 9)
					{
						$returnValue .= "<option value= '0".$i."'>0".$i."</option>";
					}
					else
					{
						$returnValue .= "<option value= '".$i."'>".$i."</option>";
					}
				}
			}
			$returnValue .= "</select> : <select style= 'font-size:16pt; font-family:Arial;' name= 'endmin' id= 'endmin'>";
			for($i= 0; $i<= 59; $i++)
			{
				if($i == $tempendminint)
				{
					if($i>= 0 && $i<= 9)
					{
						$returnValue .= "<option value= '0".$i."' selected>0".$i."</option>";
					}
					else
					{
						$returnValue .= "<option value= '".$i."' selected>".$i."</option>";
					}
				}
				else
				{
					if($i>= 0 && $i<= 9)
					{
						$returnValue .= "<option value= '0".$i."'>0".$i."</option>";
					}
					else
					{
						$returnValue .= "<option value= '".$i."'>".$i."</option>";
					}
				}
			}
			$returnValue .= "</select> <select style= 'font-size:16pt; font-family:Arial;' name= 'endtod' id= 'endtod'>";
			if($tempendtod == "AM")
			{
				$returnValue .= "<option value= 'AM' selected>AM</option>".
								"<option value= 'PM'>PM</option>";
			}
			else
			{
				$returnValue .= "<option value= 'AM'>AM</option>".
								"<option value= 'PM' selected>PM</option>";
			}
			$returnValue .= "</select></td>";
			$returnValue .= "</tr><tr><td>Faculty</td>";
			$sql_command2= "SELECT * FROM FACULTY;";
			$result2= $conn->query($sql_command2);
			$returnValue .= "<td>"."<select style= 'font-size:16pt; font-family:Arial;' name= 'facultyid' id= 'facultyid'>";
			while($row2= mysqli_fetch_array($result2))
			{
				if($row['FACULTYID'] == $row2['FACULTYID'])
				{
					$returnValue .= "<option value='" .$row2["FACULTYID"]. "' selected>" .$row2["LASTNAME"]. ", " .$row2["FIRSTNAME"]. "</option>";
				}
				else
				{
					$returnValue .= "<option value='" .$row2["FACULTYID"]. "'>" .$row2["LASTNAME"]. ", " .$row2["FIRSTNAME"]. "</option>";
				}
			}
			$returnValue .= "</select></td>";
			$returnValue .= "</tr><tr><td>Description</td>";
				 			
			$returnValue .= "<td><textarea style= 'font-size:16pt; font-family:Arial;' name= 'descr' id= 'descr' wrap= 'hard' maxlength= '280' rows= '10' cols= '50'>".$row['DESCR']."</textarea> </td>";
			$returnValue .= "</tr><tr><td></td>";
			$returnValue .= "<td><input class='button' type= 'button' name= 'update' id= 'update' value= 'Update'></td>";

				$returnValue .= "</tr>";
				$returnValue .= "</tbody></table>"; 
			
		}
	}
	echo $returnValue;
	mysqli_close($conn);
?>	