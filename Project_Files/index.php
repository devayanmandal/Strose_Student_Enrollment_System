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
<style type="text/css">.bg, .box2{behavior:url("js/PIE.htc");}
.auto-style1 {
	margin-right: 0;
}
</style>
<![endif]-->
	<script>
			$(document).ready(function(){
				$("#loginform").submit(function(){
					return false;
				});
				$("#login").click(function(){
					if($("#role").val() == "-")
					{
						$("#div1").html("Please choose an account type.");
					}
					else if($("#userid").val()&& $("#password").val())
					{
						$.get("login.php",{userid:$("#userid").val(), 
											password:$("#password").val(), 
											role:$("#role").val()}, function(result){
											if(result == "Admin")
											{
												window.location= "adminHome.php";
											}
											else if(result == "Faculty")
											{
												window.location= "facultyHome.php";
											}
											else if(result == "Student")
											{
												window.location= "studentHome.php";
											}
											else
											{
												$("#div1").html(result);
											}
						});
					}
					else{
						alert("Please Fill");
					}
				});
			});
		</script>
</head>
<body id="page1">
<div class="body1">
  <div class="main">
    <!-- header -->
    <header>
      <div class="wrapper">
        <nav>
          <ul id="menu">
            <li><a href="index.php"><strong>Home</strong></a></li>
            <li><a href="https://www.strose.edu/academics/undergraduate-programs/courses/" target="_blank">
			<strong>Courses</strong></a></li>
            <li><a href="https://www.strose.edu/academics/graduate-programs/" target="_blank">
			<strong>Programs</strong></a></li>
            <li><a href="https://www.strose.edu/faculty-staff/?letter=a/" target="_blank">
			<strong>Teachers</strong></a></li>
            <li><a href="https://www.strose.edu/admissions/" target="_blank">
			<strong>Admissions</strong></a></li>
            <li class="end"><a href="https://www.strose.edu/contact-us/" target="_blank">Contacts</a></li>
          </ul>
        </nav>
        <ul id="icon" style="height: 41px">
          <li><a href="https://www.facebook.com/TheCollegeofSaintRose" target="_blank"><img src="images/icon1.png" alt=""></a></li>
          <li><a href="https://www.linkedin.com/edu/the-college-of-saint-rose-19060" target="_blank"><img src="images/icon2.png" alt=""></a></li>
          <li><a href="https://twitter.com/CollegeofStRose?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor" target="_blank"><img src="images/icon3.jpg" alt=""></a></li>
        </ul>
      </div>
      <div class="wrapper">
        <h1>
		<a href="https://www.strose.edu/"  target="_blank" id="logo" class="auto-style1" style="width: 251px">The College Of Saint Rose</a></h1>
      </div>
      <div id="slogan">Home Of Being Prepared<span>For Your Future</span> </div>
      <ul class="banners">
	  <form id="loginform" >
	 
        <li></a><input placeholder="   ID" id="userid" name="userid"  type="text" style="height:30px;width:350px;font-size:20px; border-radius:10px; background-color:#f2f2f2 ; text-color:black "  /></li>
        <br/><li><input placeholder="  Password" id="password" name="password" type="Password" style="font-size:20px; height:30px;width:350px; border-radius:10px; background-color:#f2f2f2 ; text-color:black "  /></a></li>
		 <br/><select name="role" id="role" style="height:30px;width:200px; border-radius:10px; font-size:20px;background-color:#f2f2f2 ; "  />
		 <option value="-">Select Type</option>
		  <option value="Admin">Admin</option>
		  <option value="Faculty">Faculty</option>
		  <option value="Student">Student</option>
		</select> 
		<br/><br/>
        <li><input type="submit" onMouseOver="this.style.color='#0F0'"
   onMouseOut="this.style.color='white'" value="Login" id="login"   style="height:30px;width:200px; cursor:pointer; font-size:20px; border-radius:10px; background-color:black ; color:white "  /></a></li>
		
      </form>
	  <div id="div1"> </div>
	  </ul>
	  
    </header>
    <!-- / header -->
  </div>
</div>
<div class="body2">
  <div class="main">
    <!-- content -->
    <section id="content">
      <div class="wrapper">
        <div class="pad1 pad_top1">
		
          <article class="cols marg_right1">
            <figure><a href="https://www.strose.edu/academics/academic-resources/academic-advising/mission-statement/" target="_blank"><img src="images/mission_statement_cropped.jpg" alt=""></a></figure>
            <span class="font1">Our Mission Statement</span>
		  </article>
		  
		  <article class="cols">
            <figure><a href="https://www.strose.edu/student-life/" target="_blank"><img src="images/student_life_cropped.jpg" alt=""></a></figure>
            <span class="font1">Student Life</span>
		  </article>
		  
		  <article class="cols">
            <figure><a href="https://www.strose.edu/admissions/graduate-students/apply/" target="_blank"><img src="images/prospective_students_cropped.jpg" alt=""></a></figure>
            <span class="font1">Prospective Students</span>
		  </article>
        </div>
    </section>
    <!-- content -->
    <!-- footer -->
    <footer>
      <div class="wrapper">
        <div class="pad1">
          <div class="pad_left1">
            <div class="wrapper">
              <article class="col_1">
                <h3>Address:</h3>
                <p>
				 <strong>
				  432 Western Ave
				   <br>
                  Albany, NY
				   <br>
                  12203
				   <br>
                 </strong>
              </article>
            </div>
            <div class="wrapper">
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- / footer -->
  </div>
</div>
<script type="text/javascript">Cufon.now();</script>
</body>
</html>