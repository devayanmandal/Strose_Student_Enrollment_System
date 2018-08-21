<?php include('studHeader.php');
?>
    <section id="content">
      <div class="box1">
    <span style="display:inline-block; width: 150px;"></span><a  href="addClass.php" class="button active" >Add Classes</a> 
	<span style="display:inline-block; width: 50px;"></span><a href="viewClass.php" class="button" >View Classes </a> 
	<span style="display:inline-block; width: 50px;"></span><a href="dropClass.php" class="button" > Drop Classes</a> 
         
            <div>
			<h1>Drop Classes</h1>
			
			
		<table id='t01' class='info-table'>
<thead><tr><th colspan='2'>Enter the Enrollment ID of the Class You Wish to Drop</th></tr></thead>
<tbody>
		<tr>
		<td>
		Enrollment ID (exact value):</td><td> <input class="in1" type= "text" name= "enrollmentid" id= "enrollmentid" placeholder= "Enrollment ID"><br><br>
		</td></tr>
		<tr>
		<td></td><td>
		<span style="display:inline-block; width: 350px;"></span><input class="button" type= "button" value= "Drop Class" name= "drop" id= "drop">
		</td></tr>


</tbody>
</table>
		
		
		
		<div id ="div1"></div>
   
			  
            </div>
            
         

     
      </div>
    </section>
    <!-- content -->
 <?php include('footer.php');
?>
				<script>
			$(document).ready(function(){
				$("#drop").click(function(){
					if($("#enrollmentid").val() == "")
					{
						$("#div1").html("Please enter an exact Enrollment ID value.");
					}
					else
					{
						var enrollmentid= $('#enrollmentid').val();
						$.get("stdropenrollsearch.php",{enrollmentid}, function(result){
														if(result == true)
														{	
															$.ajax({url:"stdropenroll.php", success:function(result){
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
				
			});
		</script>