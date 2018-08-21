<?php include('facHeader.php'); ?>
    <!-- content -->
    <section id="content">
      <div class="box1">
  <h1>Update Personal Information</h1>
		
		<br><div id= "div1"></div>
		<br><div id= "div2"></div>
    </section>
    <!-- content -->
   <?php include('footer.php'); ?>
<script>
			$(document).ready(function(){
				$.get('faupdateusersearch.php', 
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
					bio= $("#bio").val();
					
					$.get('faupdateuser.php',{userid2, 
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