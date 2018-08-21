<?php include('adminHeader.php'); ?>
    <!-- content -->
    <section id="content">
      <div class="box1">
     <h1>Update Enrollment Status</h1>
	 
	 
		<table id='t01' class='info-table'>
<thead><tr><th colspan='2'>Enter Information of Enrollment to Update</th></tr></thead>
<tbody>
		<tr>
		<td>
		Enrollment ID (exact value):</td><td> <input class="in1" name= "enrollmentid" id= "enrollmentid" type= "text" placeholder= "Enrollment ID">
		</td></tr>
		<tr>
		<td colspan='2' style="text-align:center;">
		OR
		</td>
		</tr>
		<tr>
		<td>
		Student ID (exact value):</td><td> <input class="in1" name= "studentid" id= "studentid" type= "text" placeholder= "Student ID">
		</td></tr>
		<tr>
		<td colspan='2' style="text-align:center;">
		and
		</td>
		</tr>
		<tr>
		<td>
		Class ID (exact value):</td><td> <input class="in1" name= "classid" id= "classid" type= "text" placeholder= "Class ID">
		</td></tr>
		<tr>
		<td></td><td>
		<input type= "button" class="button" value= "Search" name= "search" id= "search">
		</td>
		</tr>
	
</tbody>
</table>
		
		
		<div id= "div1"></div>
		<div id= "div2"></div>
	  
      </div>
    </section>
    <!-- content -->
   <?php include('footer.php'); ?>
		<script>
			$(document).ready(function(){
				$('#search').click(function(){
					if($("#enrollmentid").val() == "" && $("#studentid").val() == "" && $("#classid").val() == "")
					{
						$("#div1").html("Please enter data in a field to search for.");
					}
					else if($("#enrollmentid").val() != "" && $("#studentid").val() != "" && $("#classid").val() != "")
					{
						$("#div1").html("Please enter either the Enrollment ID or the Student ID and Class ID.");
					}
					else if($("#enrollmentid").val() != "" && $("#studentid").val() != "" && $("#classid").val() == "")
					{
						$("#div1").html("Please enter either the Enrollment ID or the Student ID and Class ID.");
					}
					else if($("#enrollmentid").val() != "" && $("#studentid").val() == "" && $("#classid").val() != "")
					{
						$("#div1").html("Please enter either the Enrollment ID or the Student ID and Class ID.");
					}
					else if($("#enrollmentid").val() == "" && $("#studentid").val() != "" && $("#classid").val() == "")
					{
						$("#div1").html("Please enter either the Enrollment ID or the Student ID and Class ID.");
					}
					else if($("#enrollmentid").val() == "" && $("#studentid").val() == "" && $("#classid").val() != "")
					{
						$("#div1").html("Please enter either the Enrollment ID or the Student ID and Class ID.");
					}
					else
					{
						$.get('updateenrollsearch.php',{enrollmentid:$('#enrollmentid').val(), 
												studentid:$('#studentid').val(), 
												classid:$('#classid').val()}, function(result){
													if(result == false)
														$('#div1').html('Unable to find entry. Please make sure the Enrollment ID or Student ID and Class ID are correct.');
													else
														$('#div1').html(result);
												});
					}
				});
				$("#div1").on('click', '#update', function(){
					
					var enrollmentid2, studentid2, classid2, facultyid, classcode, section, status;
					$(this).closest('table').find('input').each(function(){
						if($(this).attr('id') == 'enrollmentid2') enrollmentid2 = $(this).val();
						if($(this).attr('id') == 'studentid2') studentid2 = $(this).val();
						if($(this).attr('id') == 'classid2') classid2 = $(this).val();
						if($(this).attr('id') == 'facultyid') facultyid = $(this).val();
						if($(this).attr('id') == 'classcode') classcode = $(this).val();
						if($(this).attr('id') == 'section') section = $(this).val();
					});	
					$(this).closest('table').find('select').each(function(){
						if($(this).attr('id') == 'status') status = $(this).val();
					});
					
					$.get('updateenroll.php',{enrollmentid2, 
												studentid2,
												classid2,
												facultyid,
												classcode,
												section,
												status}, function(result){
													if(result == false)
													{
														$('#div1').html('The enrollment is already assigned this status.');
													}
													else if(result == "xx")
													{
														$('#div1').html('Unable to update this enrollment. The class is at capacity.');
													}
													else
													{
														$('#div1').html(result);
													}
						});
				});
			
			});
		</script>