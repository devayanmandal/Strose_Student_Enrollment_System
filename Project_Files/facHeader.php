<?php
session_start();
if(!isset($_SESSION['role']))
	header('Location:index.php');
else if($_SESSION['role']=="Admin")
	header('Location:adminHome.php');
else if($_SESSION['role']=="Student")
	header('Location:studentHome.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Faculty</title>
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
<style type="text/css">.bg, .box2{behavior:url("js/PIE.htc");}</style>
<![endif]-->

</head>
<body id="page3">
<div class="body1" style="background: url('images/bg_top_img77.jpg') no-repeat scroll center transparent">
  <div class="main" style="width: 1053px">
    <!-- header -->
    <header>
      <div class="wrapper" style="height: 548px">
       <nav>
          <ul id="menu" style="width: 1174px">
            <li><a href="facultyHome.php">Home</a></li>   
            <li><a href="classRoster.php">Class Rosters </a></li>
            <li><a href="facdirect.php">Directory</a></li>
            <li><a href="personalinfofac.php">Personal Information</a></li>
			<li class="dropdown">
					<a href="#" class="dropbtn">Class Options</a>
					<div class="dropdown-content">
					   <a href="enrolfac.php">View Classes</a>
					  <a href="updateClassfac.php">Update Classes</a>					 
					</div>
			 </li>			        
            <li class="end"><a href="logout.php">Log Out</a></li>
          </ul>
        </nav>
      </div>
    </header>
    <!-- / header -->
  </div>
</div>
<div class="body1">
  <div class="main">
