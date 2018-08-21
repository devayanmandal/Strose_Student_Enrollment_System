<?php include('adminHeader.php'); ?>
    <!-- content -->
    <section id="content">
      <div class="box1">
       <h1>Create New User</h1>
		<table id='t01' class='info-table'>
		
		<thead><tr><th colspan='2'>Enter New User Information</th></tr></thead>
		<tbody><tr><td>
		User Type:</td><td> <select class="in1" name="role" id= "role">
			<option value= "-">Choose Account Type</option>
			<option value= "Admin">Administrator</option>
			<option value= "Faculty">Faculty</option>
			<option value= "Student">Student</option>
		</select></td></tr>
		<tr><td>Password: </td><td><input class="in1" type= "text" name= "password" id= "password" placeholder= "Password"></td></tr>
		<tr><td>First Name:</td><td> <input class="in1" type= "text" name= "firstname" id= "firstname" placeholder= "First Name"></td></tr>
		<tr><td>Last Name: </td><td><input class="in1" type= "text" name= "lastname" id= "lastname" placeholder= "Last Name"></td></tr>
		<tr><td>Address: </td><td><input class="in1" type= "text" name= "address" id= "address" placeholder= "Address"></td></tr>
		<tr><td>City:</td><td><input class="in1" type= "text" name= "city" id= "city" placeholder= "City"></td></tr>
		<tr><td>State: </td><td><select class="in1" name= "state" id= "state">
			<option value= "">Choose State</option>
			<option value= 'AL'>AL</option>
			<option value= 'AK'>AK</option>
			<option value= 'AZ'>AZ</option>
			<option value= 'AR'>AR</option>
			<option value= 'CA'>CA</option>
			<option value= 'CO'>CO</option>
			<option value= 'CT'>CT</option>
			<option value= 'DE'>DE</option>
			<option value= 'FL'>FL</option>
			<option value= 'GA'>GA</option>
			<option value= 'HI'>HI</option>
			<option value= 'ID'>ID</option>
			<option value= 'IL'>IL</option>
			<option value= 'IN'>IN</option>
			<option value= 'IA'>IA</option>
			<option value= 'KS'>KS</option>
			<option value= 'KY'>KY</option>
			<option value= 'LA'>LA</option>
			<option value= 'ME'>ME</option>
			<option value= 'MD'>MD</option>
			<option value= 'MA'>MA</option>
			<option value= 'MI'>MI</option>
			<option value= 'MN'>MN</option>
			<option value= 'MS'>MS</option>
			<option value= 'MO'>MO</option>
			<option value= 'MT'>MT</option>
			<option value= 'NE'>NE</option>
			<option value= 'NV'>NV</option>
			<option value= 'NH'>NH</option>
			<option value= 'NJ'>NJ</option>
			<option value= 'NM'>NM</option>
			<option value= 'NY'>NY</option>
			<option value= 'NC'>NC</option>
			<option value= 'ND'>ND</option>
			<option value= 'OH'>OH</option>
			<option value= 'OK'>OK</option>
			<option value= 'OR'>OR</option>
			<option value= 'PA'>PA</option>
			<option value= 'RI'>RI</option>
			<option value= 'SC'>SC</option>
			<option value= 'SD'>SD</option>
			<option value= 'TN'>TN</option>
			<option value= 'TX'>TX</option>
			<option value= 'UT'>UT</option>
			<option value= 'VT'>VT</option>
			<option value= 'VA'>VA</option>
			<option value= 'WA'>WA</option>
			<option value= 'WV'>WV</option>
			<option value= 'WI'>WI</option>
			<option value= 'WY'>WY</option>
		</select>
		</td></tr>
		<tr><td>Zip Code: </td><td><input class="in1" type= "text" name= "zipcode" id= "zipcode" placeholder= "Zip Code" size= "5" maxlength= "5"></td></tr>
		<tr><td>Phone Number:</td><td> (<input class="in1" type= "text" name= "areacode" id= "areacode" size= "3" maxlength= "3">)
		<input class="in1" type= "text" name= "phone1" id= "phone1" size= "3" maxlength= "3">-
		<input class="in1" type= "text" name= "phone2" id= "phone2" size= "4" maxlength= "4"></td></tr>
		<tr><td>E-mail Address:</td><td> <input class="in1" type= "text" name= "email" id= "email" placeholder= "E-Mail Address"></td></tr>
		<tr><td>Bio Information:</td><td><textarea wrap= "hard" class="in1"	maxlength= 250 name= "bio" id= "bio" rows= "10" cols= "50"></textarea></td></tr>
		<tr></td><td><td><input type= "button" class="button" class='button' value= "Create New User" name= "create" id= "create">
		

             
            </tbody>
			</table>
					(Bio Information field only required for Faculty. All other fields are mandatory.)
		<div id= "div1"></div>
      </div>
    </section>
    <!-- content -->
   <?php include('footer.php'); ?>
   <script>
			$(document).ready(function(){
				$("#create").click(function(){
					if($("#role").val() == "-")
					{
						$("#div1").html("Please select an account type.");
					}
					else
					{
						$.get("createusersearch.php",{password:$("#password").val(), 
												role:$("#role").val(), 
												firstname:$("#firstname").val(), 
												lastname:$("#lastname").val(), 
												address:$("#address").val(), 
												city:$("#city").val(), 
												state:$("#state").val(), 
												zipcode:$("#zipcode").val(), 
												areacode:$("#areacode").val(), 
												phone1:$("#phone1").val(), 
												phone2:$("#phone2").val(), 
												email:$("#email").val(),
												bio:$("#bio").val()}, function(result){
													if(result == false)
													{
														$.ajax({url:"createuser.php", success:function(result){
															$("#div1").html(result);
														}});
													}
													else if (result == true)
													{
														$("#div1").html("Unable to add new user. Duplicate Entry found.");
													}
													else
													{
														$("#div1").html(result);
													}
						});
					}
				});
				
			});
		</script>