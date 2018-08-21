<?php include('adminHeader.php'); ?>
    <!-- content -->
    <section id="content">
      <div class="box1">
      <h1>Delete User</h1>
	  
		
		<table id='t01' class='info-table'>
<thead><tr><th colspan='2'>Enter Information of the User to Deleted</th></tr></thead>
<tbody>
		<tr>
		<td>
		Select type of user/account to search for.</td><td>
		<select class="in1" name= "role" id= "role">
			<option value= "-">Choose Account Type</option>
			<option value= "Admin">Administrator</option>
			<option value= "Faculty">Faculty</option>
			<option value= "Student">Student</option>
		</select></td></tr>
		<tr>
		<td colspan='2'>
		Enter the User ID of the account to delete
		</td>
		</tr>
		<tr>
		<td>
		User ID (exact value):</td><td> <input class="in1" name= "userid" id= "userid" type= "text" placeholder= "User ID">
		</td></tr>
		<tr>
		<td></td><td>
		<input type= "button" class="button" value= "Delete" name= "delete" id= "delete">
		</td></tr>
	
	</tbody>
	</table>
		
		
		
		<div id ="div1"></div>
	  
      </div>
    </section>
    <!-- content -->
   <?php include('footer.php'); ?>
   <script>
			$(document).ready(function(){
				$("#delete").click(function(){
					if($("#role").val() == "-")
					{
						$("#div1").html("Please select an account type.");
					}
					else
					{
						$.get("deleteusersearch.php",{role:$("#role").val(), 
												userid:$("#userid").val()}, function(result){
													if(result == true)
													{
														$.ajax({url:"deleteuser.php", success:function(result){
															$("#div1").html(result);
														}});
													}
													else
													{
														$("#div1").html("User not found.");
													}
												});
					}
				});
				$("#goback").click(function(){
					window.location= "useroptions.htm";
				});
			});
		</script>
  	