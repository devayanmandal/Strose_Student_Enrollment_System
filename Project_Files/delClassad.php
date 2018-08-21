<?php include('adminHeader.php'); ?>
    <!-- content -->
    <section id="content">
      <div class="box1">
  <h1>Delete Class</h1>
		
		<table id='t01' class='info-table'>
<thead><tr><th colspan='2'>Enter the Class ID of the Account to Delete</th></tr></thead>
<tbody>


		<tr><td>
		Class ID (exact value):</td><td> <input class="in1" name= "classid" id= "classid" type= "number" min="100" placeholder= "Class ID">
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
					if($("#classid").val() == "")
					{
						$("#div1").html("Please enter an exact Class ID value.");
					}
					else
					{
						$.get("deleteclasssearch.php",{classid:$("#classid").val()}, function(result){
														if(result == true)
														{	
															$.ajax({url:"deleteclasses.php", success:function(result){
																$("#div1").html(result);
															}});
														}
														else
														{
															$("#div1").html("Class not found.");
														}
						});
					}
				});
				$("#goback").click(function(){
					window.location= "classoptions.htm";
				});
			});
		</script>