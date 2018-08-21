<?php include('facHeader.php');
?>
    <section id="content">
      <div class="box1">
    
         
            <div>
            
		<h1>Update Class Information</h1>
		
		<table id='t01' class='info-table'>
<thead><tr><th colspan='2'>Select a Class Below</th></tr></thead>
		</table>
		
		
		<br><div id= "div1"></div>
		<br><div id= "div2"></div>
		<br><div id= "div3"></div>	
			  
			  
			  
            </div>
            
         

     
      </div>
    </section>
    <!-- content -->
 <?php include('footer.php');
?>
			<script>
			$(document).ready(function(){
				$.get("faclasslist.php", function(result){
					if(result == false)
						$("#div1").html("No classes available.");
					else
						$("#div1").html(result);
				});
				$("#div1").on("click", "#search", function(){
				var classid= $('#classid').val();
				console.log(classid);
					$.get("faupdateclasssearch.php",{classid}, function(result){
						$("#div2").html(result);
					});
				});
				$("#div2").on("click", "#update", function(){
					var classid2, classcode, classname, classsection, enrollment, maxenrollment;
					var status, location, days, starttime, endtime, facultyid, descr;
					classid2 = $('#classid2').val();
					classcode = $('#classcode').val();
					classname = $('#classname').val();
					classsection = $('#classsection').val();
					enrollment = $('#enrollment').val();
					maxenrollment = $('#maxenrollment').val();
					status = $('#status').val();
					location = $('#location').val();
					days= $('#days').val();
					starttime= $('#starttime').val();
					endtime= $('#endtime').val();
					facultyid = $('#facultyid').val();
					descr = $('#descr').val();
					
					$.get("faupdateclasses.php", {classid2,
												classcode,
												classname,
												classsection,
												enrollment,
												maxenrollment,
												status,
												location,
												days,
												starttime,
												endtime,
												facultyid,
												descr}, function(result){
														if(result == false)
															$('#div3').html('No new information to update.');
														else
															$('#div3').html(result);
					});
				});
				
			});
		</script>