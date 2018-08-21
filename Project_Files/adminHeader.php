<?php
session_start();
if(!isset($_SESSION['role']))
	header('Location:index.php');
else if($_SESSION['role']=="Student")
	header('Location:studentHome.php');
else if($_SESSION['role']=="Faculty")
	header('Location:facultyHome.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>The College of Saint Rose Enrollment</title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<script src= "jquery-1.11.1.js"></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-replace.js"></script>
<script type="text/javascript" src="js/Molengo_400.font.js"></script>
<script type="text/javascript" src="js/Expletus_Sans_400.font.js"></script>
<!--[if lt IE 9]>
<script type="text/javascript" src="js/html5.js"></script>
<style type="text/css">.bg, .box2{behavior:url("js/PIE.htc");}
.auto-style1 {
	text-align: left;
}
.auto-style2 {
	margin-bottom: 0;
}
</style>
<![endif]-->


</head>
<body id="page4">
<div class="body5" style="background: url('images/admin.jpg') no-repeat scroll center top transparent">
  <div class="main" style="height: 330px">
    <!-- header -->
    <header>
      <div class="wrapper" style="width: 134%; height: 351px">
        <nav>
          <ul id="menu" style="width: 1318px" class="auto-style2">
				<li class="end"><a href="adminHome.php">Home</a></li>
				  <li class="dropdown">
					<a href="#" class="dropbtn">User Information</a>
					<div class="dropdown-content">
					  <a href="addUser.php">Add User</a>
					  <a href="updateUserad.php">Update User</a>
					  <a href="viewUserad.php">View User</a>
					  <a href="delUserad.php">Delete User</a>
					</div>
				  </li>
				  
				  <li class="dropdown">
					<a href="#" class="dropbtn">Class Information</a>
					<div class="dropdown-content">
					  <a href="createClassad.php">Add Class</a>
					  <a href="updateClassad.php">Update Class</a>
					  <a href="viewClassad.php">View Class</a>
					  <a href="delClassad.php">Delete Class</a>
					</div>
				  </li>
				  
				  <li class="dropdown">
					<a href="#" class="dropbtn">
					<div class="auto-style1">
						EnroLlment Information</div>
					</a>
					&nbsp;<div class="dropdown-content">
					  <a href="createEnrollad.php">Add Enrollment</a>
					  <a href="updateEnrollad.php">Update Enrollment</a>
					  <a href="viewEnrollad.php">View Enrollment</a>
					  <a href="delEnrollad.php">Delete Enrollment</a>
					</div>
				  </li>
				   <li class="end"><a href="logout.php">Logout</a></li>
		 </ul>
        </nav>
      </div>
     
    </header>
    <!-- / header -->
  </div>
</div>
<div class="body5">
  <div class="main" style="height: 268px">