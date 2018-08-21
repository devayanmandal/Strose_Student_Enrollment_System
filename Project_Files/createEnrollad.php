<?php include('adminHeader.php'); ?>
    <!-- content -->
    <section id="content">
      <div class="box1">
     <h1>Create Enrollment Record</h1>
	 
		<table id='t01' class='info-table'>
<thead><tr><th colspan='2'>Enter New Enrollment Information</th></tr></thead>
<tbody>
		<tr>
		<td colspan='2'>
		(All Fields are Mandatory)
		</td></tr>
		<tr>
		<td>
		Student ID:</td><td> <input class="in1" type= "number" name= "studentid" id= "studentid" min= "1000" placeholder= "Student ID">
		</td></tr>
		<tr>
		<td>
		Class ID:</td><td> <input class="in1" type= "number" name= "classid" id= "classid" min= "100" placeholder= "Class ID">
		</td></tr>
		<tr>
		<td></td><td>
		<input type= "button" class="button" value= "Create Enrollment" name= "create" id= "create">
		</td>
		</tr>
	
	</tbody>
	</table>
		
		
		
		<div id= "div1"></div>
	  
      </div>
    </section>
    <!-- content -->
   <?php include('footer.php'); ?>
  <script>
			$(document).ready(function(){
				$("#create").click(function(){
					if($("#studentid").val() == "" || $("#classid").val() == "")
					{
						$("#div1").html("All fields are mandatory. Please make sure that all the correct values have been entered.");
					}
					else
					{
						$.get("createenrollsearch.php",{studentid:$("#studentid").val(),
													classid:$("#classid").val()}, function(result){
													if(result == false)
													{
														$.ajax({url:"createenroll.php", success:function(result){
															if(result == true)
																$("#div1").html("A new enrollment record has been created.");
															else
																$("#div1").html(result);
														}});
													}
													else
													{
														$("#div1").html(result);
													}
						});
					}
				});
				$("#goback").click(function(){
					window.location= "enrollmentoptions.htm";
				});
			});
		</script>