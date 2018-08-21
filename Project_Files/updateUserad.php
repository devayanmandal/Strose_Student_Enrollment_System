<?php include('adminHeader.php'); ?>
    <!-- content -->
    <section id="content">
      <div class="box1">
      <h1>Update User Information</h1>
	  
		<table id='t01' class='info-table'>
<thead><tr><th colspan='2'>Enter User Information</th></tr></thead>
<tbody>
		<tr>
		<td>Select type of user/account to search for.</td>
		<td>
		<select class="in1" name= "role" id= "role">
			<option value= "-">Choose Account Type</option>
			<option value= "Admin">Administrator</option>
			<option value= "Faculty">Faculty</option>
			<option value= "Student">Student</option>
		</select></td></tr>
		<tr>
		<td colspan='2'>
		Enter either the user's User ID or First and Last Name
		</td>
		</tr>
		<tr>
		<td>
		User ID (exact value): </td><td><input class="in1" name= "userid" id= "userid" type= "text" placeholder= "User ID"><br><br>
		</td></tr>
		<tr>
		<td colspan='2' style="text-align:center;">
		OR</td></tr>
		<tr>
		<td>
		First Name (exact value):</td><td> <input class="in1" name= "firstname" id= "firstname" type= "text" placeholder= "First Name"><br>
		
		</td></tr>
		<tr>
		<td>
		Last Name (exact value):</td><td> <input class="in1" name= "lastname" id= "lastname" type= "text" placeholder= "Last Name"><br><br>
		</td>
		</tr>
		<tr>
		<td></td><td>
		<input type= "button" class='button' value= "Search" name= "search" id= "search">
		</td>
		</tr>
</tbody>
</table>
		
		
		<div id= "div1"></div>
		<br><div id= "div2"></div>
	  
      </div>
    </section>
    <!-- content -->
   <?php include('footer.php'); ?>
   <script>
			$(document).ready(function(){
				$('#search').click(function(){
					if($('#role').val() == '-')
					{
						$('#div1').html('Please select an account type.');
					}
					else if($("#userid").val() == "" && $("#firstname").val() == "" && $("#lastname").val() == "")
					{
						$("#div1").html("Please enter data in a field to search for.");
					}
					else if($("#userid").val() != "" && $("#firstname").val() != "" && $("#lastname").val() != "")
					{
						$("#div1").html("Please enter either the User ID or the First and Last Name.");
					}
					else if($("#userid").val() != "" && $("#firstname").val() != "" && $("#lastname").val() == "")
					{
						$("#div1").html("Please enter either the User ID or the First and Last Name.");
					}
					else if($("#userid").val() != "" && $("#firstname").val() == "" && $("#lastname").val() != "")
					{
						$("#div1").html("Please enter either the User ID or the First and Last Name.");
					}
					else if($("#userid").val() == "" && $("#firstname").val() != "" && $("#lastname").val() == "")
					{
						$("#div1").html("Please enter either the User ID or the First and Last Name.");
					}
					else if($("#userid").val() == "" && $("#firstname").val() == "" && $("#lastname").val() != "")
					{
						$("#div1").html("Please enter either the User ID or the First and Last Name.");
					}
					else
					{
						$('#div2').html(' ');
						$.get(	'updateusersearch.php',
								{role:$('#role').val(), 
									userid:$('#userid').val(), 
									firstname:$('#firstname').val(),
									lastname:$('#lastname').val()}, 
								function(result){
									if(result == false)
										$('#div1').html('Unable to find entry. Please make sure the User ID or First and Last name are correct.');
									else
										$('#div1').html(result);
						});
					}
				});
				$("#div1").on('click', '#update', function(){
					var userid2, password, role2, firstname2, lastname2, address, city, state, zipcode, areacode, phone1, phone2, email, bio;
					userid2 = $("#userid2").val();
					password = $("#password").val();
					role2 = $("#role2").val();
					firstname2 = $("#firstname2").val();
					lastname2 = $("#lastname2").val();
					address = $("#address").val();
					city = $("#city").val();
					state = $("#state").val();
					zipcode = $("#zipcode").val();
					areacode = $("#areacode").val();
					phone1 = $("#phone1").val();
					phone2 = $("#phone2").val();
					email = $("#email").val();
					bio= $("#bio").val();
					
					$.get('updateuser.php',{userid2, 
											password,
											role2,
											firstname2,
											lastname2,
											address,
 											city,
											state,
											zipcode,
											areacode,
											phone1,
											phone2,
											email,
											bio}, function(result){
												if(result == false)
													$('#div2').html('No new information to update.');
												else
													$('#div2').html(result);
						});
				});
				
			});
		</script>