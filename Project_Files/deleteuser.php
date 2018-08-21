<?php session_start(); ?>
<?php
	include('connect.php');
	
	if($_SESSION["tempuserid"] != $_SESSION["userid"]) //if entered userid != to current users userid
	{
		if($_SESSION["temprole"] == "Admin")
		{
			$sql_command= "DELETE FROM ADMIN WHERE ADMINID = '" .$_SESSION["tempuserid"]. "';";		
			$result= $conn->query($sql_command);
		}
		else if($_SESSION["temprole"] == "Faculty")
		{
			$sql_command= "UPDATE ENROLLMENTS SET STATUS= 'Canceled' WHERE FACULTYID = '" .$_SESSION["tempuserid"]. "' AND STATUS IN ('Enrolled','In Progress');";
			$result= $conn->query($sql_command);
			$sql_command2= "DELETE FROM CLASSES WHERE FACULTYID = '" .$_SESSION["tempuserid"]. "';";
			$result2= $conn->query($sql_command2);
			$sql_command3= "DELETE FROM FACULTY WHERE FACULTYID = '" .$_SESSION["tempuserid"]. "';";
			$result3= $conn->query($sql_command3);
		}
		else if($_SESSION["temprole"] == "Student")
		{
			$sql_command=  "SELECT * FROM ENROLLMENTS WHERE STUDENTID = '" .$_SESSION["tempuserid"]. "';";
			$result= $conn->query($sql_command);
			
			while($row= mysqli_fetch_array($result))
			{
				$sql_command2= "SELECT * FROM CLASSES WHERE CLASSID = '" .$row["CLASSID"]. "';";
				$result2= $conn->query($sql_command2);
				
				while($row2= mysqli_fetch_array($result2))
				{
					$currEnroll= $row2["ENROLLMENT"] - 1;
					$sql_command3= "UPDATE CLASSES SET ENROLLMENT = " .$currEnroll. " WHERE CLASSID = " .$row["CLASSID"]. ";";
					$result3= $conn->query($sql_command3);
					$sql_command4= "DELETE FROM ENROLLMENTS WHERE ENROLLMENTID = '" .$row["ENROLLMENTID"]. "';";
					$result4= $conn->query($sql_command4);
				}
			}

			$sql_command5= "DELETE FROM STUDENT WHERE STUDENTID = '" .$_SESSION["tempuserid"]. "';";
			$result5= $conn->query($sql_command5);
		}
	}
	else
	{
		$returnValue= "Error. A user cannot delete their own profile. Please have another administrator perform this action.";
	}
	
	if(mysqli_affected_rows($conn) > 0)
	{
		if($_SESSION["temprole"] == "Admin")
		{
			$returnValue= "Admin account for User ID: " .$_SESSION["tempuserid"]. " has been deleted.";
		}
		else if($_SESSION["temprole"] == "Faculty")
		{
			$returnValue= "Faculty account, and classes for User ID: " .$_SESSION["tempuserid"]. " have been deleted.";
		}
		else if($_SESSION["temprole"] == "Student")
		{
			$returnValue= "Student account and enrollments for User ID: " .$_SESSION["tempuserid"]. " have been deleted.";
		}
	}
	echo $returnValue;
	mysqli_close($conn);
?>
