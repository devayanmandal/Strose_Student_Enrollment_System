<?php session_start(); ?>
<?php
	include('connect.php');
	$returnValue= false;
	$timeflag= false;
	$timeerrorflag= false;
	$subjectcode= $_GET["subjectcode"];
	$classnumber= $_GET["classnumber"];
	$classcode= $subjectcode . " " . $classnumber;
	$classname= $_GET["classname"];
	$classsection= $_GET["classsection"];
	$enrollment= 0;
	$maxenrollment= $_GET["maxenrollment"];
	$status= $_GET["status"];
	$location= $_GET["location"];
	$sunday= $_GET["sunday"];
	$monday= $_GET["monday"];
	$tuesday= $_GET["tuesday"];
	$wednesday= $_GET["wednesday"];
	$thursday= $_GET["thursday"];
	$friday= $_GET["friday"];
	$saturday= $_GET["saturday"];
	$days= "";
	$starthour= $_GET["starthour"];
	$startmin= $_GET["startmin"];
	$starttod= $_GET["starttod"];
	$starthourint= intval($starthour);
	$startminint= intval($startmin);
	$starttime= $starthour. ":" .$startmin. " " .$starttod;
	$endhour= $_GET["endhour"];
	$endmin= $_GET["endmin"];
	$endtod= $_GET["endtod"];
	$endhourint= intval($endhour);
	$endminint= intval($endmin);
	$endtime= $endhour. ":" .$endmin. " " .$endtod;
	$descr= $_GET["descr"];
	$facultyid= $_GET["facultyid"];
	
	do
	{
		if($starttod == $endtod)
		{
			if($starttod == "AM" && $endtod == "AM")
			{
				if($starthourint == 12)
				{
					$returnValue= "Invalid time. No classes may be held after 10:00 PM or before 7:00 AM.";
					$timeerrorflag= true;
				}
				else if($endhourint == 12 )
				{
					$returnValue= "Invalid time. No classes may be held after 10:00 PM or before 7:00 AM.";
					$timeerrorflag= true;
				}
				else if($starthourint < 7)
				{
					$returnValue= "Invalid time. No classes may be held after 10:00 PM or before 7:00 AM.";
					$timeerrorflag= true;
				}
				else if($endhourint < 7)
				{
					$returnValue= "Invalid time. No classes may be held after 10:00 PM or before 7:00 AM.";
					$timeerrorflag= true;
				}
				else if($endhourint < $starthourint)
				{
					$returnValue= "Invalid time. End time must be greater than start time.";
					$timeerrorflag= true;
				}
				else if($starthourint == $endhourint && $endminint <= $startminint)
				{
					$returnValue= "Invalid time. End time must be greater than start time.";
					$timeerrorflag= true;
				}
				else if($endhourint > $starthourint + 3)
				{
					$returnValue= "Invalid time. No class may be longer than 3 hours.";
					$timeerrorflag= true;
				}
				else if($endhourint == $starthourint + 3 && $endminint > $startminint)
				{
					$returnValue= "Invalid time. No class may be longer than 3 hours.";
					$timeerrorflag= true;
				}
			}
			else if($starttod == "PM" && $endtod == "PM")
			{
				if($starthourint == 12)
				{
					if($endhourint == $starthourint && $endminint < $startminint)
					{
						$returnValue= "Invalid time. End time must be greater than start time.";
						$timeerrorflag= true;
					}
					else if($endhourint > 3 && $endhourint <= 11)
					{
						$returnValue= "Invalid time. No class may be longer than 3 hours.";
						$timeerrorflag= true;
					}
					else if($endhourint == 3 && $endminint > $startminint)
					{
						$returnValue= "Invalid time. No class may be longer than 3 hours.";
						$timeerrorflag= true;
					}
				}
				else if($starthourint == 10)
				{
					$returnValue= "Invalid time. No classes may be held after 10:00 PM or before 7:00 AM.";
					$timeerrorflag= true;
				}
				else if($endhourint == 10 && $endminint > 0)
				{
					$returnValue= "Invalid time. No classes may be held after 10:00 PM or before 7:00 AM.";
					$timeerrorflag= true;
				}
				else if($starthourint == 11)
				{
					$returnValue= "Invalid time. No classes may be held after 10:00 PM or before 7:00 AM.";
					$timeerrorflag= true;
				}
				else if($endhourint == 11)
				{
					$returnValue= "Invalid time. No classes may be held after 10:00 PM or before 7:00 AM.";
					$timeerrorflag= true;
				}
				else if($endhourint == $starthourint && $endminint < $startminint)
				{
					$returnValue= "Invalid time. End time must be greater than start time.";
					$timeerrorflag= true;
				}
				else if($endhourint > $starthourint + 3)
				{
					$returnValue= "Invalid time. No class may be longer than 3 hours.";
					$timeerrorflag= true;
				}
				else if($endhourint == $starthourint + 3 && $endminint > $startminint)
				{
					$returnValue= "Invalid time. No class may be longer than 3 hours.";
					$timeerrorflag= true;
				}
			}
		}
		else if($starttod != $endtod)
		{
			if($starttod == "PM" && $endtod == "AM")
			{
				$returnValue= "Invalid time. No classes may be held after 10:00 PM or before 7:00 AM.";
				$timeerrorflag= true;
			}
			else if($starttod == "AM" && $endtod == "PM")
			{
				if($starthourint == 12)
				{
					$returnValue= "Invalid time. No classes may be held after 10:00 PM or before 7:00 AM.";
					$timeerrorflag= true;
				}
				else if($starthourint == 9 && $endhourint != 12)
				{
					$returnValue= "Invalid time. No class may be longer than 3 hours.";
					$timeerrorflag= true;
				}
				else if($starthourint == 9 && $endhourint == 12)
				{
					if($endminint > $startminint)
					{
						$returnValue= "Invalid time. No class may be longer than 3 hours.";
						$timeerrorflag= true;
					}
				}
				else if($starthourint == 10)
				{
					if($endhourint != 12)
					{
						if($endhourint == 1 && $endminint > $startminint)
						{
							$returnValue= "Invalid time. No class may be longer than 3 hours.";
							$timeerrorflag= true;
						}
						else if($endhourint != 1)
						{
							$returnValue= "Invalid time. No class may be longer than 3 hours.";
							$timeerrorflag= true;
						}
					}
				}
				else if($starthourint == 11)
				{
					if($endhourint != 12)
					{
						if($endhourint != 1)
						{
							if($endhourint == 2 && $endminint > $startminint)
							{
								$returnValue= "Invalid time. No class may be longer than 3 hours.";
								$timeerrorflag= true;
							}
							else if($endhourint != 2)
							{
								$returnValue= "Invalid time. No class may be longer than 3 hours.";
								$timeerrorflag= true;
							}
						}
					}
				}
			}
		}
		$timeflag= true;
	}
	while($timeflag == false);
	
	if($timeerrorflag == true)
	{
		echo $returnValue;
		mysqli_close($conn);
	}
	else if(preg_match('/[A-Z]{3}/',$subjectcode) == 0)
	{
		$returnValue = "Invalid subject code. Code must be a string of 3 capital letters.";
		echo $returnValue;
		mysqli_close($conn);
	}
	else if(preg_match('/[0-9]{3}/',$classnumber) == 0)
	{
		$returnValue = "Invalid class number. Number must be a 3 digit value.";
		echo $returnValue;
		mysqli_close($conn);
	}
	else if($classname == "")
	{
		$returnValue = "Invalid value for class name. Please enter the name of the class.";
		echo $returnValue;
		mysqli_close($conn);
	}
	else if(preg_match('/^[1-9]\d*$/',$classsection) == 0)
	{
		$returnValue = "Invalid class section. Please enter the class section number.";
		echo $returnValue;
		mysqli_close($conn);
	}
	else if($maxenrollment <= 0 || $maxenrollment == "")
	{
		$returnValue = "Invalid value for max enrollment. Must be greater than zero.";
		echo $returnValue;
		mysqli_close($conn);
	}
	else if($status == "-")
	{
		$returnValue = "Invalid status. Please select if the class is open or closed.";
		echo $returnValue;
		mysqli_close($conn);
	}	
	else if($location == "")
	{
		$returnValue = "Invalid location. Please enter the location where the class is to take place.";
		echo $returnValue;
		mysqli_close($conn);
	}
	else if($sunday == "No" && $monday == "No" && $tuesday == "No" && $wednesday == "No" && $thursday == "No" && $friday == "No" && $saturday == "No")
	{
		$returnValue = "Error. You must select at least 1 day which the class will meet on.";
		echo $returnValue;
		mysqli_close($conn);
	}
	else if($descr == "")
	{
		$returnValue= "Invalid description. Please enter a description of the class.";
		echo $returnValue;
		mysqli_close($conn);
	}
	else if($facultyid == "-")
	{
		$returnValue= "Invalid value. Please select a Professor.";
		echo $returnValue;
		mysqli_close($conn);
	}
	else
	{
		$sql_command= "SELECT * FROM CLASSES WHERE CLASSCODE = '" . $classcode . "' AND SEC = '" . $classsection . "';";
		$result= $conn->query($sql_command);
	
		if(mysqli_fetch_array($result) > 0)
		{
			$returnValue= true;
		}
		else
		{
			$_SESSION["classcode"]= $classcode;
			$_SESSION["classname"]= $classname;
			$_SESSION["classsection"]= $classsection;
			$_SESSION["enrollment"]= $enrollment;
			$_SESSION["maxenrollment"]= $maxenrollment;
			$_SESSION["status"]= $status;
			$_SESSION["location"]= $location;
			if($sunday == "Yes")
			{
				$days= "Su";
			}
			if($monday == "Yes")
			{	
				if($days == "")
					$days= "M";
				else
					$days .= ", M";	
			}
			if($tuesday == "Yes")
			{
				if($days == "")
					$days= "Tu";
				else
					$days .= ", Tu";
			}
			if($wednesday == "Yes")
			{
				if($days == "")
					$days= "W";
				else
					$days .= ", W";
			}
			if($thursday == "Yes")
			{
				if($days == "")
					$days= "Th";
				else
					$days .= ", Th";
			}
			if($friday == "Yes")
			{
				if($days == "")
					$days= "F";
				else
					$days .= ", F";
			}
			if($saturday == "Yes")
			{
				if($days == "")
					$days= "Sa";
				else
					$days .= ", Sa";
			}
			$_SESSION["days"]= $days;
			$_SESSION["starttime"]= $starttime;
			$_SESSION["endtime"]= $endtime;
			$_SESSION["descr"]= $descr;
			$_SESSION["facultyid"]= $facultyid;
		}
		echo $returnValue;
		mysqli_close($conn);	
	}
?>