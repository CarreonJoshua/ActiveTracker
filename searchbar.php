<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="style/style.css">
</head>
<body>
	<ul style="position:fixed;top:0;width:100%">
		<center>
  		<li><a href="index-change.php">Submissions</a></li>
  		<li><a href="addnew-student.php">Students</a></li>
  		<li><a href="addnew-activity.php">Activities</a></li>
  		<li><a href="addnew-section.php">Sections & Subjects</a></li>
  		<li><a class="active" href="searchbar.php">Search...</a></li>
  		</center>
	</ul>
	<div style="display:flex;flex-direction:column;align-items:center;justify-content: center" >
		<div style="margin:20px;text-align:center">
			<h2>students</h2>
			<table>
		  <thead>
		    <tr>
		    	<th>studID</th>
		      	<th>firstName</th>
		      	<th>lastName</th>
		      	<th>section</th>
		      	<th>gender</th>
		    </tr>
		  </thead>
		  <tbody>
		  		<?php
		  		include "connection.php";
		  		$sql = "SELECT * FROM students;";
		  		$result = mysqli_query($conn, $sql);
		  		while ($row = mysqli_fetch_assoc($result)) {
		  			?>
		  			<tr>
				      <td><?php echo $row['studID'] ?></td>
				      <td><?php echo $row['firstName'] ?></td>
				      <td><?php echo $row['lastName'] ?></td>
				      <td><?php echo $row['section'] ?></td>
				      <td><?php echo $row['gender'] ?></td>
				    </tr>
			    	<?php
		   	?>
		  		<?php
		  		}
		  	?>
		  			</tbody>
				</table>
		</div>
		<div style="margin:20px;text-align:center">
			<h2>contact</h2>
			<table>
		  <thead>
		    <tr>
		    	<th>contactID</th>
		      	<th>studID</th>
		      	<th>phoneNum</th>
		      	<th>email</th>
		      	<th>address</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php 
		  		$sql = "SELECT * FROM contact;";
		  		$result = mysqli_query($conn, $sql);
		  		while ($row = mysqli_fetch_assoc($result)) {
		  			?>
		  			<tr>
				      <td><?php echo $row['contactID'] ?></td>
				      <td><?php echo $row['studID'] ?></td>
				      <td><?php echo $row['phoneNum'] ?></td>
				      <td><?php echo $row['email'] ?></td>
				      <td><?php echo $row['address'] ?></td>
				    </tr>
			    	<?php
		   	?>
		  		<?php
		  		}
		  	?>
		  </tbody>
		</table>
		</div>
		<div style="margin:20px;text-align:center">
			<h2>section</h2>
			<table>
		  <thead>
		    <tr>
		    	<th>sectionID</th>
		      	<th>section_code</th>
		      	<th>courseid</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php 
		  		$sql = "SELECT * FROM section;";
		  		$result = mysqli_query($conn, $sql);
		  		while ($row = mysqli_fetch_assoc($result)) {
		  			?>
		  			<tr>
				      <td><?php echo $row['sectionID'] ?></td>
				      <td><?php echo $row['section_code'] ?></td>
				      <td><?php echo $row['courseid'] ?></td>
				    </tr>
			    	<?php
		   	?>
		  		<?php
		  		}
		  	?>
		  </tbody>
		</table>
		</div>
		<div style="margin:20px;text-align:center">
			<h2>subject</h2>
			<table>
		  <thead>
		    <tr>
		    	<th>subjectCode</th>
		      	<th>subName</th>
		      	<th>description</th>
		      	<th>sectionID</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php 
		  		$sql = "SELECT * FROM subject;";
		  		$result = mysqli_query($conn, $sql);
		  		while ($row = mysqli_fetch_assoc($result)) {
		  			?>
		  			<tr>
				      <td><?php echo $row['subjectCode'] ?></td>
				      <td><?php echo $row['subName'] ?></td>
				      <td><?php echo $row['description'] ?></td>
				      <td><?php echo $row['sectionID'] ?></td>
				    </tr>
			    	<?php
		   	?>
		  		<?php
		  		}
		  	?>
		  </tbody>
		</table>
		</div>
		<div style="margin:20px;text-align:center">
			<h2>activity</h2>
			<table>
		  <thead>
		    <tr>
		    	<th>activityNum</th>
		      	<th>subjectCode</th>
		      	<th>name</th>
		      	<th>instruction</th>
		      	<th>totalscore</th>
		      	<th>date_given</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php 
		  		$sql = "SELECT * FROM activity;";
		  		$result = mysqli_query($conn, $sql);
		  		while ($row = mysqli_fetch_assoc($result)) {
		  			?>
		  			<tr>
				      <td><?php echo $row['activityNum'] ?></td>
				      <td><?php echo $row['subjectCode'] ?></td>
				      <td><?php echo $row['name'] ?></td>
				      <td><?php echo $row['instruction'] ?></td>
				      <td><?php echo $row['totalscore'] ?></td>
				      <td><?php echo $row['date_given'] ?></td>
				    </tr>
			    	<?php
		   	?>
		  		<?php
		  		}
		  	?>
		  </tbody>
		</table>
		</div>
		<div style="margin:20px;text-align:center;margin-bottom:80px">
			<h2>submission</h2>
			<table>
		  <thead>
		    <tr>
		    	<th>submitID</th>
		      	<th>studentID</th>
		      	<th>activityNum</th>
		      	<th>dateSubmitted</th>
		      	<th>status</th>
		      	<th>score</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php 
		  		$sql = "SELECT * FROM submission;";
		  		$result = mysqli_query($conn, $sql);
		  		while ($row = mysqli_fetch_assoc($result)) {
		  			?>
		  			<tr>
				      <td><?php echo $row['submitID'] ?></td>
				      <td><?php echo $row['studentID'] ?></td>
				      <td><?php echo $row['activityNum'] ?></td>
				      <td><?php echo $row['dateSubmitted'] ?></td>
				      <td><?php echo $row['status'] ?></td>
				      <td><?php echo $row['score'] ?></td>
				    </tr>
			    	<?php
		   	?>
		  		<?php
		  		}
		  	?>
		  </tbody>
		</table>
		</div>
	</div>
	<div class="flex-container">
		<div class="mightybond" style="position:fixed;bottom:10px;background-color:#c9f5ee;">
			<div>
				<input type="text" name="table" id="table" style="font-size:25px" placeholder="Table name">
				<input type="text" name="column" id="column" style="font-size:25px" placeholder="Column name">
				<input type="text" name="value" id="value" style="font-size:25px" placeholder="Values name">
				<input type="text" name="other" id="other" style="font-size:25px" placeholder="Other parameters">
				<input type="button" value="search" onclick="search()" style="font-size:20px">
			</div>
		</div>
	</div>
	<script>
		let i = 0;
		//clears the cache on startup
		while(i < 40){
			document.cookie = i + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/activetracker3;"
			i++
		}
		document.cookie = "table"
		function search(){
			//Defining the search values
			var table = document.getElementById('table').value.trim();
			var column = document.getElementById('column').value.trim();
			var value = document.getElementById('value').value.trim();
			var others = document.getElementById('other').value.trim();
			//these turn the search values into arrays. the spaces separate the different keys into array items
			var tableSplit = table.split(' ')
			var columnSplit = column.split(' ')
			var valueSplit = value.split(' ')
			var othersSplit = others.split(' ')
			//setting the table name
			if(table !== ''){
				if(tableSplit.length >= 2){
					i = 0
					for(i = 0; i < tableSplit.length; i++){
						document.cookie = i + " = " + tableSplit[i];
					}
				}
				else if(tableSplit.length == 1){
					document.cookie = "0 = " + table;
				}
			}
			//setting the column name
			if(column !== ''){
				if(columnSplit.length >= 2){
					j = 10
					for(i = 0; i < columnSplit.length; i++){
						console.log(columnSplit[i])
						document.cookie = j + " = " + columnSplit[i];
						j++
					}
				}
				else if(columnSplit.length == 1){
					document.cookie = "10 = " + column;
				}
			}
			//setting the values used
			if(value !== ''){
				if(valueSplit.length >= 2){
					j=20
					for(i = 0; i < valueSplit.length; i++){
						console.log(valueSplit[i])
						document.cookie = j + " = " + valueSplit[i];
						j++
					}
				}
				else if(columnSplit.length == 1){
					console.log('Your inputted value is: Value: ' + value)
					document.cookie = "20 = " + value;
				}
			}
			//setting the following other parameters
			if(others !== ''){
				if(othersSplit.length >= 2){
					j = 30
					for(i = 0; i < othersSplit.length; i++){
						console.log(othersSplit[i])
						document.cookie = j + " = " + othersSplit[i];
						j++
					}
				}
				else if(columnSplit.length == 1){
					document.cookie = "30 = " + others;
				}
			}
		window.location.href="result.php";
		}
	</script>
</body>
</html>
