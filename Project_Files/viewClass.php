<?php include('studHeader.php');
?>
    <section id="content">
      <div class="box1">
    <span style="display:inline-block; width: 150px;"></span><a  href="addClass.php" class="button active" >Add Classes</a> 
	<span style="display:inline-block; width: 50px;"></span><a href="viewClass.php" class="button" >View Classes </a> 
	<span style="display:inline-block; width: 50px;"></span><a href="dropClass.php" class="button" > Drop Classes</a> 
         
            <div>
			<h1>View Classes</h1>
		
			<div id ="div1"></div>
   
			  
            </div>
            
         

     
      </div>
    </section>
    <!-- content -->
 <?php include('footer.php');
?>
			<script>
			$(document).ready(function(){
						$.get("stviewenrollsearch.php", function(result){
													if(result == true)
													{
														$.ajax({url:"stviewenroll.php", success:function(result){
															$("#div1").html(result);
														}});
													}
													else
													{
														$("#div1").html("No enrollments found.");
													}
						});
				
			});
		</script>