<?php include('adminHeader.php'); ?>
    <!-- content -->
    <section id="content">
      <div class="box1">
     <h1>Create New Class</h1>
		<table id='t01' class='info-table'>
<thead><tr><th colspan='2'>Enter New Class Information</th></tr></thead>
<tbody>
		<tr>
		<td>
		Class Code:</td><td> <input class="in1" type= "text" name= "subjectcode" id= "subjectcode" placeholder= "Subject Code">
		</td></tr>
		<tr>
		<td>Class Number</td><td>
		<input class="in1" type= "number" name= "classnumber" id= "classnumber" min="1" placeholder= "Class Number">
		</td>
		</tr>
		<tr>
		<td>
		Class Name:</td><td> <input class="in1" type= "text" name= "classname" id= "classname" placeholder= "Class Title"></td></tr>
		
		<tr><td>Class Section:</td><td> <input class="in1" type= "text" name= "classsection" id= "classsection" placeholder= "Class Section">
		</td></tr>
		<tr><td>Max Enrollment:</td><td> <input class="in1" type= "number" name= "maxenrollment" min= "1"id= "maxenrollment" placeholder= "Max Enrollment">
		</td></tr>
		<tr><td>
		Status: </td><td><select class="in1" name= "status" id= "status">
		<option value= "-">Select Status</option>
		<option value= "Open">Open</option>
		<option value= "Closed">Closed</option>
		</select></td></tr>
		
		<tr>
		<td>
		Location: </td><td><input class="in1" type= "text" name= "location" id= "location" placeholder= "Location">
		</td>
		</tr>
		<tr>
		<td>
		Days:
</td><td>		Sunday:<select class="in1"  name= "sunday" id= "sunday">
							<option value= "No">No</option>
							<option value= "Yes">Yes</option>
						</select>
				Monday:<select class="in1"  name= "monday" id= "monday">
							<option value= "No">No</option>
							<option value= "Yes">Yes</option>
						</select>
				Tuesday:<select class="in1"  name= "tuesday" id= "tuesday">
							<option value= "No">No</option>
							<option value= "Yes">Yes</option>
						</select>
				Wednesday:<select class="in1"  name= "wednesday" id= "wednesday">
							<option value= "No">No</option>
							<option value= "Yes">Yes</option>
						</select>
				Thursday:<select class="in1"  name= "thursday" id= "thursday">
							<option value= "No">No</option>
							<option value= "Yes">Yes</option>
						</select>
				Friday:<select class="in1"  name= "friday" id= "friday">
							<option value= "No">No</option>
							<option value= "Yes">Yes</option>
						</select>
				Saturday:<select class="in1"  name= "saturday" id= "saturday">
							<option value= "No">No</option>
							<option value= "Yes">Yes</option>
						</select> 
						</td></tr>
							
							<tr>
							<td>
							
		Start Time:</td><td> <select class="in1"  name= "starthour" id= "starthour">
						<option value= "12">12</option>
						<option value= "01">01</option>
						<option value= "02">02</option>
						<option value= "03">03</option>
						<option value= "04">04</option>
						<option value= "05">05</option>
						<option value= "06">06</option>
						<option value= "07">07</option>
						<option value= "08">08</option>
						<option value= "09">09</option>
						<option value= "10">10</option>
						<option value= "11">11</option>
					</select>
					:
					<select class="in1"  name= "startmin" id= "startmin">
						<option value= "00">00</option>
						<option value= "01">01</option>
						<option value= "02">02</option>
						<option value= "03">03</option>
						<option value= "04">04</option>
						<option value= "05">05</option>
						<option value= "06">06</option>
						<option value= "07">07</option>
						<option value= "08">08</option>
						<option value= "09">09</option>
						<option value= "10">10</option>
						<option value= "11">11</option>
						<option value= "12">12</option>
						<option value= "13">13</option>
						<option value= "14">14</option>
						<option value= "15">15</option>
						<option value= "16">16</option>
						<option value= "17">17</option>
						<option value= "18">18</option>
						<option value= "19">19</option>
						<option value= "20">20</option>
						<option value= "21">21</option>
						<option value= "22">22</option>
						<option value= "23">23</option>
						<option value= "24">24</option>
						<option value= "25">25</option>
						<option value= "26">26</option>
						<option value= "27">27</option>
						<option value= "28">28</option>
						<option value= "29">29</option>
						<option value= "30">30</option>
						<option value= "31">31</option>
						<option value= "32">32</option>
						<option value= "33">33</option>
						<option value= "34">34</option>
						<option value= "35">35</option>
						<option value= "36">36</option>
						<option value= "37">37</option>
						<option value= "38">38</option>
						<option value= "39">39</option>
						<option value= "40">40</option>
						<option value= "41">41</option>
						<option value= "42">42</option>
						<option value= "43">43</option>
						<option value= "44">44</option>
						<option value= "45">45</option>
						<option value= "46">46</option>
						<option value= "47">47</option>
						<option value= "48">48</option>
						<option value= "49">49</option>
						<option value= "50">50</option>
						<option value= "51">51</option>
						<option value= "52">52</option>
						<option value= "53">53</option>
						<option value= "54">54</option>
						<option value= "55">55</option>
						<option value= "56">56</option>
						<option value= "57">57</option>
						<option value= "58">58</option>
						<option value= "59">59</option>
					</select> 
					<select class="in1"  name= "starttod" id= "starttod">
						<option value= "AM">AM</option>
						<option value= "PM">PM</option>
					</select>
					</td>
					</tr>
					
					<tr>
					<td>
		
		End Time: </td><td><select class="in1"  name= "endhour" id= "endhour">
						<option value= "12">12</option>
						<option value= "01">01</option>
						<option value= "02">02</option>
						<option value= "03">03</option>
						<option value= "04">04</option>
						<option value= "05">05</option>
						<option value= "06">06</option>
						<option value= "07">07</option>
						<option value= "08">08</option>
						<option value= "09">09</option>
						<option value= "10">10</option>
						<option value= "11">11</option>
					</select>
					:
					<select class="in1"  name= "endmin" id= "endmin">
						<option value= "00">00</option>
						<option value= "01">01</option>
						<option value= "02">02</option>
						<option value= "03">03</option>
						<option value= "04">04</option>
						<option value= "05">05</option>
						<option value= "06">06</option>
						<option value= "07">07</option>
						<option value= "08">08</option>
						<option value= "09">09</option>
						<option value= "10">10</option>
						<option value= "11">11</option>
						<option value= "12">12</option>
						<option value= "13">13</option>
						<option value= "14">14</option>
						<option value= "15">15</option>
						<option value= "16">16</option>
						<option value= "17">17</option>
						<option value= "18">18</option>
						<option value= "19">19</option>
						<option value= "20">20</option>
						<option value= "21">21</option>
						<option value= "22">22</option>
						<option value= "23">23</option>
						<option value= "24">24</option>
						<option value= "25">25</option>
						<option value= "26">26</option>
						<option value= "27">27</option>
						<option value= "28">28</option>
						<option value= "29">29</option>
						<option value= "30">30</option>
						<option value= "31">31</option>
						<option value= "32">32</option>
						<option value= "33">33</option>
						<option value= "34">34</option>
						<option value= "35">35</option>
						<option value= "36">36</option>
						<option value= "37">37</option>
						<option value= "38">38</option>
						<option value= "39">39</option>
						<option value= "40">40</option>
						<option value= "41">41</option>
						<option value= "42">42</option>
						<option value= "43">43</option>
						<option value= "44">44</option>
						<option value= "45">45</option>
						<option value= "46">46</option>
						<option value= "47">47</option>
						<option value= "48">48</option>
						<option value= "49">49</option>
						<option value= "50">50</option>
						<option value= "51">51</option>
						<option value= "52">52</option>
						<option value= "53">53</option>
						<option value= "54">54</option>
						<option value= "55">55</option>
						<option value= "56">56</option>
						<option value= "57">57</option>
						<option value= "58">58</option>
						<option value= "59">59</option>
					</select> 
					<select class="in1"  name= "endtod" id= "endtod">
						<option value= "AM">AM</option>
						<option value= "PM">PM</option>
					</select>
					</td>
					</tr>
					<tr>
					<td>
		Instructor:</td><td> <div id= "facultylist"></div></td></tr>
		<tr>
		<td>
		
		Class Description:</td><td> <textarea class="in1" name= "descr" id= "descr" rows= "4" cols= "50"></textarea><br><br>
		</td></tr>
		
		<tr>
		<td></td><td>
		<input type= "button" class="button" value= "Create New Class" name= "create" id= "create">
</td>
</tr>


</tbody>
</table>
		<div id= "div1"></div>
	  
      </div>
    </section>
    <!-- content -->
   <?php include('footer.php'); ?>
		<script>
			$(document).ready(function(){
				$.get('facultylist.php',function(result){
					if(result == false)
						$("#facultylist").html("Unable to locate faculty members. New classes cannot be created at this time.");
					else
						$("#facultylist").html(result);
					});		
				$("#create").click(function(){
					var facultyid= $('select[id="facultyid"]').val();
						$.get("createclasssearch.php",{subjectcode:$("#subjectcode").val(),
													classnumber:$("#classnumber").val(),
													classname:$("#classname").val(), 
													classsection:$("#classsection").val(), 
													maxenrollment:$("#maxenrollment").val(), 
													status:$("#status").val(), 
													location:$("#location").val(), 
													sunday:$("#sunday").val(), 
													monday:$("#monday").val(), 
													tuesday:$("#tuesday").val(), 
													wednesday:$("#wednesday").val(), 
													thursday:$("#thursday").val(),
													friday:$("#friday").val(),
													saturday:$("#saturday").val(),
													starthour:$("#starthour").val(),
													startmin:$("#startmin").val(),
													starttod:$("#starttod").val(),
													endhour:$("#endhour").val(),
													endmin:$("#endmin").val(),
													endtod:$("#endtod").val(),
													descr: $("#descr").val(),
													facultyid}, function(result){
													if(result == false)
													{
														$.ajax({url:"createclasses.php", success:function(result){
																$("#div1").html(result);
														}});
													}
													else if(result == true)
													{
														$("#div1").html("Unable to create a new class. Duplicate found.");
													}
													else
													{
														$("#div1").html(result); 
													}
						});
				});
				
			});
		</script>