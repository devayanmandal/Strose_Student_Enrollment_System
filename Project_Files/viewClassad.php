<?php include('adminHeader.php'); ?>
    <!-- content -->
    <section id="content">
      <div class="box1">
   <h1>View Class Information</h1>
   
   
		<table id='t01' class='info-table'>
<thead><tr><th colspan='2'>Enter Class Information to Search By</th></tr></thead>
<tbody>

<tr>
<td colspan='2'>
		Enter either the Class ID or Class Code
		</td>
		</tr>
		<tr>
		<td>
		Class ID (starts with):
</td><td>		<input class="in1" name= "classid" id= "classid" type= "text" placeholder= "Class ID">
		</td></tr>
		<tr>
		<td colspan='2' style="text-align:center;">
		OR
		</td>
		</tr>
		<tr>
		<td>
		Class Code (starts with):</td><td> <input class="in1" type= "text" name= "classcode" id= "classcode" placeholder= "Class Code">
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
					if($("#classid").val() == "" && $("#classcode").val() == "")
					{
						$("#div1").html("Please enter data in any field to search for.");
					}
					else if($("#classid").val() != "" && $("#classcode").val() != "")
					{
						$("#div1").html("Please enter either a Class ID or a Class Code.");
					}
					else
					{
						$.get("viewclasssearch.php",{classcode:$("#classcode").val(), 
												classid:$("#classid").val()}, function(result){
													if(result == true)
													{
														$.ajax({url:"viewclasses.php", success:function(result){
															$("#div1").html(result);
														}});
													}
													else
													{
														$("#div1").html("No classes found.");
													}
												});
					}							
				});
				$('#div1').on('click', '#descr', function(){
					var descrid;
					descrid= $(this).closest('tr').children('td:eq(0)').text();
					$.get("classdescr.php", {descrid}, function(result){
						var w= window.open("", "", "width= 1100, height= 500");
						w.document.write('<html><head><title>Class Description</title><style> table { width:100%;} table, th, td {border: 1px solid black;border-collapse: collapse;}th, td { padding: 5px; text-align: left;}table#t01 tr:nth-child(even) {background-color: #eee;}table#t01 tr:nth-child(odd) { background-color:#fff;}table#t01 th	{background-color: black; color: white;} </style></head><body><h1>Class Description</h1> <table id="t01" ><tr><th>Class Description</th></tr><tbody><tr><td> <pre>');					
					w.document.write(result);
						w.document.write('</pre></td></tr></tbody></body></html>');
					});
				});
				
			});
		</script>