<?php
include "connection.php";
if(isset($_POST['submit'])) {
	$studID = $_POST['studID'];
	$activity = $_POST['activityNum'];
	$date = $_POST['dateSubmitted'];
	$status = $_POST['status'];

	$sql = "INSERT INTO submission(studentID, activityNum, dateSubmitted, status) VALUES('$studID', '$activity', '$date', '$status')";
	$result = mysqli_query($conn, $sql);
	if($result) {
		echo "Success!";
	}
	else {
		echo "Unsuccessful";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="style/style.css">
	<title>Add To Records</title>
	<script src="script.js"></script>
</head>
<body>
	<ul>
		<center>
  		<li><a class="active" href="index-change.php">Submissions</a></li>
  		<li><a href="addnew-student.php">Students</a></li>
  		<li><a href="addnew-activity.php">Activities</a></li>
  		<li><a href="addnew-section.php">Sections</a></li>
  		</center>
	</ul>
	<div class="flex-container">
		<div>
			<p id="msg"></p>
		</div>
		<div class="flexbox">
			<h3>This page is similar to the other, but it contains the ability to edit and change and even add new entries.</h3>
		</div>
		<div class="flexbox">
		<table>
		  <thead>
		    <tr>
		    	<th>Student ID</th>
		      	<th>First Name</th>
		      	<th>Last Name</th>
		      	<th>Section</th>
		      	<th>Activity No.</th>
		      	<th>Status</th>
		      	<th>Score</th>
		      	<th>Total Score</th>
		      	<th>Date Submitted</th>
		      	<th></th>
		    </tr>
		  </thead>
		  <tbody>
		  		<?php
		  		include "connection.php";
		  		$sql = "SELECT submitID, students.studID, students.firstName, students.lastName, students.section, activity.activityNum, status, label, score, totalscore, dateSubmitted FROM `submission` LEFT JOIN `students` ON submission.studentID = students.studID LEFT JOIN `activity` ON activity.activityNum = submission.activityNum LEFT JOIN status ON status.statusID = submission.status;";
		  		$result = mysqli_query($conn, $sql);
		  		while ($row = mysqli_fetch_assoc($result)) {
		  			?>
		  			<tr>
				      <td><?php echo $row['studID'] ?></td>
				      <td><?php echo $row['firstName'] ?></td>
				      <td><?php echo $row['lastName'] ?></td>
				      <td><?php echo $row['section'] ?></td>
				      <td><?php echo $row['activityNum'] ?></td>
				      <td><?php echo $row['label'] ?></td>
				      <td><?php echo $row['score'] ?></td>
				      <td><?php echo $row['totalscore'] ?></td>
				      <td><?php echo $row['dateSubmitted'] ?></td>
				      <td>
				      	<a href="update-submissions.php?id=<?php echo $row['submitID'] ?>">edit</a>
				      	<a href="delete-submissions.php?id=<?php echo $row['submitID'] ?>">remove</a>
				    </tr>
			    	<?php
		   	?>
		  		<?php
		  		}
		  	?>
		  			</tbody>
				</table>
		  	</div>

		  	<div class="flexbox">
		  		<form action="" method="post">
				<div>
					<table style="border:0">
						<tr>
							<td>
								<label class="label">Student ID</label>
							</td>
							<td>
								<input type="text" class="form-control" name="studID">
							</td>
							<td>
								<input type="button" value="Record a new Student" onclick="recStud()" name="return"/>
							</td>
						</tr>
						<tr>
							<td>
								<label class="form-label text-light-emphasis">Activity Number</label>
							</td>
							<td>
								<input type="text" class="form-control" name="activityNum">
							</td>
							<td>
								<input type="button" value="Record a new Activity" onclick="recAct()" name="return"/>
							</td>
						</tr>
						<tr>
							<td>
								<label class="label">Date Submitted</label>
							</td>
							<td>
								<input type="text" class="form-control" name="dateSubmitted" placeholder="YYYY-MM-DD HH:MM:SS">
							</td>
							<td>
								<input type="button" value="Record a new Section" onclick="recSec()" name="return"/>
							</td>
						</tr>
						<tr>
							<td>
								<label>Status</label>
							</td>
							<td>
								<form>
									<input type="radio" id="status" name="status" value=0>
									<label for="0">On-time submission</label> <br>
									<input type="radio" id="status" name="status" value=1>
									<label for="1">Late submission</label> <br>

								</form>
							</td>
							<td>
								<center>
								<button type="submit" class="button" name="submit">Insert</button>
								</center>
							</td>
						</tr>
						</table>
		  			</div>
		  		</form>
		 	</div>	
	</div>

</body>
</html>