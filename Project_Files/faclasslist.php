<?php session_start(); ?>
<?php
	include('connect.php');
	$returnValue= false;
	$facultyid= $_SESSION["userid"];
	$sql_command= "SELECT * FROM CLASSES WHERE FACULTYID = '" .$facultyid. "';";
	$result= $conn->query($sql_command);
	
		$returnValue = "<select style= 'font-size:16pt;' name= 'classid' id= 'classid'>".
					   "<option value= '-' selected>Choose a class</option>";
		while($row= mysqli_fetch_array($result))
		{
			$returnValue .= "<option value= " .$row["CLASSID"]. ">Class: " .$row["CLASSCODE"]. " Section: " .$row["SEC"]. "</option>";
		}
		$returnValue .= "</select>";
		$returnValue .= "        <input type= 'button' class='button' value= 'Search' name= 'search' id= 'search'>";
	echo $returnValue;
	mysqli_close($conn);
?>