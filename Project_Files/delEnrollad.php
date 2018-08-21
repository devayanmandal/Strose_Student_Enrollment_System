<?php include('adminHeader.php'); ?>
    <!-- content -->
    <section id="content">
      <div class="box1">
     <h1>Delete Enrollment Records</h1>
	 
		<table id='t01' class='info-table'>
<thead><tr><th colspan='2'>Enter the Enrollment ID of the account to delete</th></tr></thead>
<tbody>
		<tr><td>
		Enrollment ID (exact value):</td><td> <input class="in1" name= "enrollmentid" id= "enrollmentid" type= "number" min="10000" placeholder= "Enrollment ID">
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
					if($("#enrollmentid").val() == "")
					{
						$("#div1").html("Please enter an exact Enrollment ID value.");
					}
					else
					{
						$.get("deleteenrollsearch.php",{enrollmentid:$("#enrollmentid").val()}, function(result){
														if(result == true)
														{	
															$.ajax({url:"deleteenroll.php", success:function(result){
																$("#div1").html(result);
															}});
														}
														else
														{
															$("#div1").html("Enrollment not found.");
														}
						});
					}
				});
				$("#goback").click(function(){
					window.location= "enrollmentoptions.htm";
				});
			});
		</script>