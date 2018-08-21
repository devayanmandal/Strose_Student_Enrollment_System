<?php
session_start();
if(!isset($_SESSION['role']))
	header('Location:index.php');
else if($_SESSION['role']=="Admin")
	header('Location:adminHome.php');
else if($_SESSION['role']=="Faculty")
	header('Location:facultyHome.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>The College Of Saint Rose Enrollment</title>
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
<div class="body3">
  <div class="main">
    <!-- header -->
    <header>
      <div class="wrapper" style="width: 109%">
        <nav>
          <ul id="menu" style="width: 1180px">
            <li><a href="studentHome.php">Home</a></li>
   
            <li><a href="enrolementoption.php">Enrollment</a></li>
            <li><a href="facultydirectory.php">Student/Faculty Directory</a></li>
            <li><a href="personalinfo.php">Personal Information</a></li>
            <li class="end" style="width: 120px"><a href="logout.php">Log Out</a></li>
          </ul>
        </nav>
      </div>
      <div class="wrapper">
        <h1><a href="https://www.strose.edu/" target = "_blank" id="logo">The College Of Saint Rose</a></h1>
      </div>
      <div id="slogan" style="width: 667px; height: 121px;"> We Will Open The World<span>of knowledge for you!</span> </div>
    </header>
    <!-- / header -->
  </div>
</div>

<div class="body3">
  <div class="main">
    <!-- content -->