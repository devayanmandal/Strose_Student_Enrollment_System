<?php include('facHeader.php'); ?>
    <!-- content -->
    <section id="content">
      <div class="box1">
  <h1>View Class Rosters</h1>
		
		<br><br>
		<div id ="div1"></div><br>
		<div id= "div2"></div>
      </div>
    </section>
    <!-- content -->
   <?php include('footer.php'); ?>
   	<script>
			$(document).ready(function(){
				$.get("faclasslist.php", function(result){
						if(result == false)
							$("#div1").html("No classes available.");
						else
							$("#div1").html(result);
				});
				$("#div1").on("click", "#search", function(){
						$.get("faviewenrollsearch.php",{classid:$("#classid").val()}, function(result){
													if(result == true)
													{
														$.ajax({url:"faviewenroll.php", success:function(result){
															$("#div2").html(result);
														}});
													}
													else
													{
														$("#div2").html("No enrollments found.");
													}
												});
					
				});
				
			});
		</script>