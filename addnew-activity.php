<?php
include "connection.php";
if(isset($_POST['submit'])) {
	$activityNum= $_POST['activity'];
	$subject = $_POST['subjectFor'];
	$name = $_POST['name'];
	$description = $_POST['description'];
	$totalscore = $_POST['totalscore'];

	$sql = "INSERT INTO activity(activityNum, subjectCode, name, instruction, totalscore) VALUES ('$activityNum', '$subject', '$name', '$description', '$totalscore')";
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
</head>
<body>
	<ul>
		<center>
  		<li><a href="index-change.php">Submissions</a></li>
  		<li><a href="addnew-student.php">Students</a></li>
  		<li><a class="active" href="addnew-activity.php">Activities</a></li>
  		<li><a href="addnew-section.php">Sections & Subjects</a></li>
  		<li><a href="searchbar.php">Search...</a></li>
  		</center>
	</ul>
	<div class="flex-container">
		<div class="mightybond">
			<div>
				<h3>This is to update preexisting records </h3>
			</div>
			<div>
				<p>Please abide by proper notice of the records.</p>
			</div>
		</div>
		<div class="flexbox">
		<table>
		  <thead>
		    <tr>
		    	<th>Activity Num</th>
		    	<th>Subject Code</th>
		      	<th>Activity Name</th>
		      	<th>Description</th>
		      	<th>Total Score</th>
		      	<th>Date Given</th>
		      	<th colspan="2"></th>
		    </tr>
		  </thead>
		  <tbody>
		  		<?php
		  		include "connection.php";
		  		$sql = "SELECT activityNum, activity.subjectCode, subject.subjectCode, name, subName, instruction, totalscore, date_given FROM activity LEFT JOIN subject ON activity.subjectCode = subject.subjectCode;";
		  		$result = mysqli_query($conn, $sql);
		  		while ($row = mysqli_fetch_assoc($result)) {
		  			?>
		  			<tr>
				      <td><?php echo $row['activityNum'] ?></td>
				      <td><?php echo $row['subName'] ?></td>
				      <td><?php echo $row['name'] ?></td>
				      <td><?php echo $row['instruction'] ?></td>
				      <td><?php echo $row['totalscore'] ?></td>
				      <td><?php echo $row['date_given'] ?></td>
				      <td>
				      	<a href="update-activity.php?id=<?php echo $row['activityNum'] ?>">edit</a>
				      </td>
				      <td>
				      	<a href="delete-activity.php?id=<?php echo $row['activityNum'] ?>">remove</a>
				      </td>
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
					<table style="border:0">
						<tr>
							<td>
								<label class="label">Activity Number</label>
							</td>
							<td>
								<input type="text" class="form-control" name="activity">
							</td>
						</tr>
						<tr>
							<td>
								<label class="label">Subject Code</label>
							</td>
							<td>
								<input type="text" class="form-control" name="subjectFor">
							</td>
						</tr>
						<tr>
							<td>
								<label class="label">Activity Name</label>
							</td>
							<td>
								<input type="text" class="form-control" name="name">
							</td>
						</tr>
						<tr>
							<td>
								<label class="form-label text-light-emphasis">Description</label>
							</td>
							<td>
								<input type="text" class="form-control" name="description">
							</td>
						</tr>
						<tr>
							<td>
								<label class="form-label text-light-emphasis">Total Score</label>
							</td>
							<td>
								<input type="text" class="form-control" name="totalscore">
							</td>
						</tr>
						<tr>
							<td>
								<button type="submit" class="btn btn-info" name="submit">Insert</button>
							</td>
							<td>
								<input type="button" value="Return" onclick="Return()" name="return"/>
							</td>
						</tr>
					</table>
				</form>
			</div>
		</div>
		<script src="script.js"></script>
	</body>
</html>
