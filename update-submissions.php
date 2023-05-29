<?php
include "connection.php";
$id = $_GET['id'];
if(isset($_POST['submit'])) {
	$studID = $_POST['studID'];
	//$section = $_POST['section'];
	$activity = $_POST['activityNum'];
	$score = $_POST['score'];

	$sql = "UPDATE `submission` SET studentID = '$studID', activityNum = '$activity', score='$score' WHERE submitID = '$id'";
	$result = mysqli_query($conn, $sql);
	if($result) {
		header("Location: index-change.php?msg=3");
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
  		<li><a class="active" href="index-change.php">Submissions</a></li>
  		<li><a href="addnew-student.php">Students</a></li>
  		<li><a href="addnew-activity.php">Activities</a></li>
  		<li><a href="addnew-section.php">Sections</a></li>
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
			<?php
			$sql = "SELECT submitID, students.studID, students.firstName, students.lastName, students.section, activity.activityNum, dateSubmitted, score, totalscore, status FROM `submission` LEFT JOIN `students` ON submission.studentID = students.studID LEFT JOIN `activity` ON activity.activityNum = submission.activityNum WHERE submitID = '$id' LIMIT 1;";
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_assoc($result);
			?>
		<div class="flexbox">
			<form action="" method="post">
				<table style="border:0">
						<tr>
							<td>
								<label>Student ID</label>
							</td>
							<td>
								<input type="text" class="form-control" name="studID" value="<?php echo $row['studID']?>">
							</td>
						</tr>
						<tr>
							<td>
								<label>Activity Number</label>
							</td>
							<td>
								<input type="text" class="form-control" name="activityNum" value="<?php echo $row['activityNum']?>">
							</td>
						</tr>
						<tr>
							<td>
								<label>Score</label>
							</td>
							<td>
								<input type="text" class="form-control" name="score" value="<?php echo $row['score']?>" maxlength="3" size="3"><label> / <?php echo $row['totalscore'] ?></label>
							</td>
						</tr>
						<tr>
							<td>
								<button type="submit" class="btn btn-info" name="submit">Update</button>
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
