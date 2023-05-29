<!DOCTYPE html>
<html>
<head>
	<!--Here be the Bootstraps-->
	<link rel="stylesheet" href="style/style.css">
	<title>Add To Records</title>
</head>
<body>
	<ul>
		<center>
  			<li><a href="index-change.php">Submissions</a></li>
  			<li><a href="addnew-student.php">Students</a></li>
  			<li><a href="addnew-activity.php">Activities</a></li>
  			<li><a href="addnew-section.php">Sections</a></li>
  		</center>
	</ul>
	<div class="flex-container">
		<div class="flexbox">
			<h3>This table contains details for all of the students who had submitted an activity.</h3>
		</div>
		<div class="flexbox">
		<table>
		  <thead>
		    <tr>
		    	<th scope="col">Student ID</th>
		      	<th scope="col">First Name</th>
		      	<th scope="col">Last Name</th>
		      	<th scope="col">Section</th>
		      	<th scope="col">Activity No.</th>
		      	<th scope="col">Date Submitted</th>
		    </tr>
		  </thead>
		  <tbody>
		  		<?php
		  		include "connection.php";
		  		$sql = "SELECT submitID, students.studID, students.firstName, students.lastName, students.section, activity.activityNum, dateSubmitted FROM `submission` LEFT JOIN `students` ON submission.studentID = students.studID LEFT JOIN `activity` ON activity.activityNum = submission.activityNum;";
		  		$result = mysqli_query($conn, $sql);
		  		while ($row = mysqli_fetch_assoc($result)) {
		  			?>
		  			<tr>
				      <td><?php echo $row['studID'] ?></td>
				      <td><?php echo $row['firstName'] ?></td>
				      <td><?php echo $row['lastName'] ?></td>
				      <td><?php echo $row['section'] ?></td>
				      <td><?php echo $row['activityNum'] ?></td>
				      <td><?php echo $row['dateSubmitted'] ?></td>
			    	<?php
		   	?>
		  		<?php
		  		}
		  	?>
		  			</tbody>
				</table>
		  	</div>
		<div class="flexbox">
			<input type="button" class="button" value="Change Records" onclick="Return()" name="return"/>
		</div>
	</div>
	<script src="script.js"></script>
</body>
</html>