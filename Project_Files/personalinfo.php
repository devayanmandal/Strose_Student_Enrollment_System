<?php include('studHeader.php');
?>
    <section id="content">
      
             <h1>Update Personal Information</h1>
		
		<br><div id= "div1"></div>
		<br><div id= "div2"></div>
			  

<br>
<!--
<table id="t01">
  <tr>
    <th>User id</th>
	<th>Password</th>
	<th>Role</th>
    <th>First Name</th>		
   
	<th>Last Name</th>
	 <th>Address</th>
    <th>City</th>		
    <th>State</th>
	<th>Zip Code</th>
    <th>Phone</th>		
    <th>Email</th>
		
    
  </tr>
  <tr>
    <td>Jill</td>
    <td>Smith</td>		
    <td>50</td>
	<td>Jill</td>
    <td>Smith</td>		
    <td>50</td>
	<td>Jill</td>
    <td>Smith</td>		
    <td>50</td>
	<td>Jill</td>
    <td>Smith</td>		
    
  </tr>
  
</table>
    -->  
            
         
    </section>
    <!-- content -->
 <?php include('footer.php');
?>
	<script>
			$(document).ready(function(){
				$.get('stupdateusersearch.php', 
					function(result){
						if(result == false)
							$('#div1').html('Unable to find entry.');
						else
							$('#div1').html(result);
				});

				$("#div1").on('click', '#update', function(){
					var userid2, password, role2, firstname2, lastname2, address, city, state, zipcode, areacode, phone1, phone2, email, bio;
					userid2 = $("#userid2").val();
					password = $("#password").val();
					role2= $("#role2").val();
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
					
					$.get('stupdateuser.php',{userid2, 
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
											email}, function(result){
												if(result == false)
													$('#div2').html('No new information to update.');
												else
													$('#div2').html(result);
						});
				});
				
			});
		</script>