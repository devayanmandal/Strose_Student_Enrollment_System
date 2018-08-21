<?php include('studHeader.php');
?>
    <section id="content">
      <div class="box1">
    <span style="display:inline-block; width: 150px;"></span><a  href="addClass.php" class="button active" >Add Classes</a> 
	<span style="display:inline-block; width: 50px;"></span><a href="viewClass.php" class="button" >View Classes </a> 
	<span style="display:inline-block; width: 50px;"></span><a href="dropClass.php" class="button" > Drop Classes</a> 
         
            <div>
			<h1>Add Classes</h1>
			
		<table id='t01' class='info-table'>
<thead><tr><th colspan='2'>Enter New Enrollment Information</th></tr></thead>
<tbody>
		<tr>
		<td>
		Class ID:</td><td> <input class="in1" type= "number" name= "classid" id="classid" min= "100" placeholder= "Class ID" /><br><br>
		</td></tr>
		<tr>
		<td></td><td>
		<span style="display:inline-block; width: 350px;"></span><input type= "button" class="button"  value= "Add Class" name= "create" id= "create">
		</td></tr>


</tbody>
</table>
		
		<div id= "div1"></div>
   
			  
            </div>
            
         

     
      </div>
    </section>
    <!-- content -->
 <?php include('footer.php');
?>
			<script>
			$(document).ready(function(){
				$("#create").click(function(){
					if($("#classid").val() == "")
					{
						$("#div1").html("Please enter the ID number of the class you wish to enroll in.");
					}
					else
					{
						$.get("stcreateenrollsearch.php",{classid:$("#classid").val()}, function(result){
													if(result == false)
													{
														$.ajax({url:"stcreateenroll.php", success:function(result){
															if(result == true)
																$("#div1").html("A new enrollment record has been created.");
															else
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