<?php include('adminHeader.php'); ?>
    <!-- content -->
    <section id="content">
      <div class="box1">
  <h1>Update Class</h1>
		
		
		<table id='t01' class='info-table'>
<thead><tr><th colspan='2'>Enter the Class ID of the Account to Update</th></tr></thead>
<tbody>

<tr>
<td>
Class ID (exact value):</td><td> <input class="in1" name= "classid" id= "classid" type= "number" min="100" placeholder= "Class ID">
		</td>
		</tr>
<tr>
<tr>
<td colspan="2">
OR
		</td>
		</tr>
<tr>
<td>
Class Code (exact value):</td><td>  <input style= 'font-size:16pt;' type= "text" name= "classcode" id= "classcode" placeholder= "Class Code">
		</td>
		</tr>		

		<tr>
		<td></td><td>
		<input type= "button" class="button" value= "search" name= "search" id= "search">
		</td>
		</tr>
		
		
	
</tbody>
</table>
		
		
		
		
		<div id ="div1"></div>
		<div id ="div2"></div>
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
						$("#div1").html("Please enter data to search for in only one field.");
					}
					else
					{
						$.get("updateclasssearch.php",{classid: $("#classid").val(),
													classcode: $("#classcode").val()}, function(result){
													if(result == false)
														$("#div1").html('Unable to find entry. Please make sure the Class ID or Class Code is correct.');
													else
														$("#div1").html(result);
						});
					}
				});
				$("#div1").on("click", "#update", function(){
					var classid2, classname, maxenrollment, status, location;
					var	sunday, monday, tuesday, wednesday, thursday, friday, saturday;
					var starthour, startmin, starttod, endhour, endmin, endtod, facultyid;
					classid2 = $('#classid2').val();
					classname = $('#classname').val();
					maxenrollment = $('#maxenrollment').val();
					status = $('#status').val();
					location = $('#location').val();
					sunday = $('#sunday').val();
					monday = $('#monday').val();
					tuesday = $('#tuesday').val();
					wednesday = $('#wednesday').val();
					thursday = $('#thursday').val();
					friday = $('#friday').val();
					saturday = $('#saturday').val();
					starthour = $('#starthour').val();
					startmin = $('#startmin').val();
					starttod = $('#starttod').val();
					endhour = $('#endhour').val();
					endmin = $('#endmin').val();
					endtod = $('#endtod').val();
					facultyid = $('#facultyid').val();
					descr = $('#descr').val();
					
					$.get("updateclasses.php", {classid2,
												classname,
												maxenrollment,
												status,
												location,
												sunday,
												monday,
												tuesday,
												wednesday,
												thursday,
												friday,
												saturday,
												starthour,
												startmin,
												starttod,
												endhour,
												endmin,
												endtod,
												facultyid,
												descr}, function(result){
														if(result == false)
															$('#div2').html('No new information to update.');
														else
															$('#div2').html(result);
					});
				});
				
			});
		</script>