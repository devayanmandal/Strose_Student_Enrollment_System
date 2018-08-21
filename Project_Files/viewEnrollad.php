<?php include('adminHeader.php'); ?>
    <!-- content -->
    <section id="content">
      <div class="box1">
     <h1>View Enrollment Records</h1>
	 
	 
		<table id='t01' class='info-table'>
<thead><tr><th colspan='2'>Enter Information to Search By</th></tr></thead>
<tbody>
		<tr>
		<td>
		Student ID (starts with):</td><td> <input class="in1" name= "studentid" id= "studentid" type= "text" placeholder= "Student ID"><br><br>
		</td></tr>
		<tr>
		<td colspan='2' style="text-align:center;">
		OR
		</td>
		</tr>
		<tr>
		<td>
		Faculty ID (starts with):</td><td> <input class="in1" name= "facultyid" id= "facultyid" type= "text" placeholder= "Faculty ID"><br><br>
		</td>
		</tr>
		<tr>
		<td colspan='2' style="text-align:center;">
		OR
		</td>
		</tr>
		<tr>
		<td>
		Class ID (starts with):</td><td> <input class="in1" name= "classid" id= "classid" type= "text" placeholder= "Class ID"><br><br>
		</td></tr>
		<tr>
		<td></td><td>
		<input type= "button" class="button" value= "Search" name= "search" id= "search">
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
				$("#search").click(function(){
					if($("#studentid").val() == "" && $("#facultyid").val() == "" && $("#classid").val() == "")
					{
						$("#div1").html("Please enter data in any field to search for.");
					}
					else if($("#studentid").val() != "" && $("#facultyid").val() != "" && $("#classid").val() != "")
					{
						$("#div1").html("Please enter data to search for in only one field.");
					}
					else if($("#studentid").val() != "" && $("#facultyid").val() != "")
					{
						$("#div1").html("Please enter data to search for in only one field.");
					}
					else if($("#facultyid").val() != "" && $("#classid").val() != "")
					{
						$("#div1").html("Please enter data to search for in only one field.");
					}
					else if($("#studentid").val() != "" && $("#classid").val() != "")
					{
						$("#div1").html("Please enter data to search for in only one field.");
					}
					else
					{
						$.get("viewenrollsearch.php",{studentid:$("#studentid").val(), 
												facultyid:$("#facultyid").val(), 
												classid:$("#classid").val()}, function(result){
													if(result == true)
													{
														$.ajax({url:"viewenroll.php", success:function(result){
															$("#div1").html(result);
														}});
													}
													else
													{
														$("#div1").html("No enrollment found.");
													}
												});
					}
				});
				
			});
		</script>