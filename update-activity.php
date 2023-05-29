<?php
include "connection.php";
$id = $_GET['id'];
if(isset($_POST['submit'])) {
	$name = $_POST['name'];
	$description = $_POST['description'];
	$totalscore = $_POST['totalscore'];

	$sql = "UPDATE `activity` SET name = '$name', instruction = '$description', totalscore = '$totalscore' WHERE activityNum = '$id'";
	$result = mysqli_query($conn, $sql);
	if($result) {
		header("Location: addnew-activity.php");
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
			$sql = "SELECT * FROM activity WHERE activityNum = '$id' LIMIT 1;";
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_assoc($result);
			?>
		<div class="flexbox">
			<form action="" method="post">
				<table style="border:0">
						<tr>
							<td>
								<label class="label">Activity Name</label>
							</td>
							<td>
								<input type="text" class="form-control" name="name" value="<?php echo $row['name']?>">
							</td>
						</tr>
						<tr>
							<td>
								<label class="label">Activity Description</label>
							</td>
							<td>
								<input type="text" class="form-control" name="description" value="<?php echo $row['instruction']?>">
							</td>
						</tr>
						<tr>
							<td>
								<label class="label">Total Score</label>
							</td>
							<td>
								<input type="text" class="form-control" name="totalscore" value="<?php echo $row['totalscore']?>">
							</td>
						</tr>
						<tr>
							<td>
								<button type="submit" class="btn btn-info" name="submit">Update</button>
							</td>
							<td>
								<input type="button" value="Return" onclick="recAct()" name="return"/>
							</td>
						</tr>
					</table>
				</form>
			</div>
		</div>
		<script src="script.js"></script>
	</body>
</html>
