<?php include('adminHeader.php'); ?>
    <!-- content -->
    <section id="content">
      <div class="box1">
      <h1>View User Information</h1>
			<table id='t01' class='info-table'>
		
		<thead><tr><th colspan='2'>Enter User Information To Search</th></tr></thead>
		<tbody><tr><td>
		Select type of user/account to search for.</td><td>
		<select class="in1" name= "role" id= "role">
			<option value= "-">Choose Account Type</option>
			<option value= "Admin">Administrator</option>
			<option value= "Faculty">Faculty</option>
			<option value= "Student">Student</option>
		</select></td></tr>
		<tr><td colspan="2"> 
		Enter either the user's User ID or First/Last Name</td></tr>
		<tr><td>User ID (starts with): </td><td><input class="in1" name= "userid" id= "userid" type= "text" placeholder= "User ID"></td></tr>
		<tr><td colspan="2" style="text-align:center;"> OR <br><br></td></tr>
			
		<tr><td>First Name (starts with):</td><td> <input  class="in1" name= "firstname" id= "firstname" type= "text" placeholder= "First Name"></td></tr>
		<tr><td colspan="2" style="text-align:center;"> AND/OR</td></tr>
		<tr><td>Last Name (starts with):</td><td> <input  class="in1" name= "lastname" id= "lastname" type= "text" placeholder= "Last Name"></td></tr>
		<tr><td></td><td><input type= "button" class="button" value= "Search" name= "search" id= "search"></td></tr>
		 </tbody>
			</table>
		
		<br><br>
		<div id= "div1"></div><br><br><br><br><br>
      </div>
    </section>
    <!-- content -->
   <?php include('footer.php'); ?>
  	<script>
			$(document).ready(function(){
				$("#search").click(function(){
					if($("#role").val() == "-")
					{
						$("#div1").html("Please select an account type.");
					}
					else if($('#userid').val() == "" && $('#firstname').val() == "" && $('#lastname').val() == "")
					{
						$("#div1").html("Please enter data in any of the fields to search.");
					}
					else if($('#userid').val() != "" && $('#firstname').val() != "" && $('#lastname').val() != "")
					{
						$("#div1").html("Please enter either the User ID or the First and/or Last Name.");
					}
					else if($('#userid').val() != "" && $('#firstname').val() == "" && $('#lastname').val() != "")
					{
						$("#div1").html("Please enter either the User ID or the First and/or Last Name.");
					}
					else if($('#userid').val() != "" && $('#firstname').val() != "" && $('#lastname').val() == "")
					{
						$("#div1").html("Please enter either the User ID or the First and/or Last Name.");
					}
					else
					{
						$.get("viewusersearch.php",{role:$("#role").val(), 
												userid:$("#userid").val(), 
												firstname:$("#firstname").val(),
												lastname:$("#lastname").val()}, function(result){
													if(result == true)
													{
														$.ajax({url:"viewuser.php", success:function(result){
															$("#div1").html(result);
														}});
													}
													else
													{
														$("#div1").html("No user found.");
													}
												});
					}
				});
				$('#div1').on('click', '#bio', function(){
					var bioid, firstname, lastname;
					bioid= $(this).closest('tr').children('td:eq(0)').text();
					$.get("facultybio.php", {bioid}, function(result){
						var w= window.open("", "", "width= 1100, height= 500");
							w.document.write('<html><head><title>Bio Information</title><style> table { width:100%;} table, th, td {border: 1px solid black;border-collapse: collapse;}th, td { padding: 5px; text-align: left;}table#t01 tr:nth-child(even) {background-color: #eee;}table#t01 tr:nth-child(odd) { background-color:#fff;}table#t01 th	{background-color: black; color: white;} </style></head><body><h1>Bio Information</h1> <table id="t01" ><tr><th>Bio Information</th></tr><tbody><tr><td> <pre>');					
					w.document.write(result);
						w.document.write('</pre></td></tr></tbody></body></html>');
					});
				});
				
			});
		</script>