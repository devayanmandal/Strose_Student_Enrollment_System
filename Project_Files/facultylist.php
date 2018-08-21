<?php session_start(); ?>
<?php
		include('connect.php');
	$sql_command= "SELECT * FROM FACULTY;";
	$result= $conn->query($sql_command);
	$returnValue= false;
	
	if(mysqli_num_rows($result) > 0)
	{
		$returnValue= "<select style= 'font-size:16pt; font-family:Arial;' name= 'facultyid' id= 'facultyid'>";
		$returnValue .= "<option value = '-'>-</option>";
		while($row= mysqli_fetch_array($result))
		{
			$returnValue .= "<option value='" .$row["FACULTYID"]. "'>" .$row["LASTNAME"]. ", " .$row["FIRSTNAME"]. "</option>";
		}
		$returnValue .= "</select>";
	}
	echo $returnValue;
	mysqli_close($conn);
?>