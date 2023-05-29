<?php
include "connection.php";

$id = $_GET['id'];
$id2 = $_GET['id2'];
if(isset($_POST['submit'])) {
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$section = $_POST['section'];
	$gender = $_POST['gender'];

	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$sql = "UPDATE `students` SET firstName = '$firstName', lastName = '$lastName', section = '$section', gender = '$gender' WHERE studID = '$id'";
	$result = mysqli_query($conn, $sql);
	if($result) {
		$sql = "INSERT INTO `contact`(contactID, studID, phoneNum, email, address) VALUES ('$id2', '$id', '$phone', '$email', '$address')";
		$result = mysqli_query($conn, $sql);
		$sql = "UPDATE `contact` SET phoneNum ='$phone', email = '$email', address = '$address' WHERE studID = '$id'";
		$result = mysqli_query($conn, $sql);
		if($result){
			header("Location: addnew-student.php");
		}
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
  		<li><a class="active" href="addnew-student.php">Students</a></li>
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
			$sql = "SELECT * FROM students WHERE studID = '$id' LIMIT 1;";
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_assoc($result);
			?>
		<div class="flexbox">
			<form action="" method="post">
				<table style="border:0">
						<tr>
							<td>
								<label class="form-label text-light-emphasis">First Name</label>
							</td>
							<td>
								<input type="text" class="form-control" name="firstName" value="<?php echo $row['firstName']?>">
							</td>
						</tr>
						<tr>
							<td>
								<label class="form-label text-light-emphasis">Last Name</label>
							</td>
							<td>
								<input type="text" class="form-control" name="lastName" value="<?php echo $row['lastName']?>">
							</td>
						<tr>
							<td>
								<label class="form-label text-light-emphasis">Section</label>
							</td>
							<td>
								<input type="text" class="form-control" name="section" value="<?php echo $row['section']?>">
							</td>
						</tr>
						<?php
					$sql = "SELECT * FROM contact WHERE studID = '$id' LIMIT 1;";
					$result = mysqli_query($conn, $sql);
					$row = mysqli_fetch_assoc($result);
					?>
						<tr>
							<td>
								<label class="form-label text-light-emphasis">Phone Number</label>
							</td>
							<td>
								<input type="text" class="form-control" name="phone" value="<?php echo $row['phoneNum']?>">
							</td>
						</tr>
						<tr>
							<td>
								<label class="form-label text-light-emphasis">Email</label>
							</td>
							<td>
								<input type="text" class="form-control" name="email" value="<?php echo $row['email']?>">
							</td>
						</tr>
						<tr>
							<td>
								<label class="form-label text-light-emphasis">Phone Number</label>
							</td>
							<td>
								<input type="text" class="form-control" name="address" value="<?php echo $row['address']?>">
							</td>
						</tr>
						<tr>
							<td>
								<label>Gender</label>
							</td>
							<td>
								<form>
									<input type="radio" id="male" name="gender" value="male">
 									<label for="male">Male</label><br>
									<input type="radio" id="female" name="gender" value="female">
 									<label for="female">Female</label>
								</form>
							</td>
						</tr>
						<tr>
							<td>
								<button type="submit" class="btn btn-info" name="submit">Update</button>
							</td>
							<td>
								<input type="button" value="Return" onclick="recStud()" name="return"/>
							</td>
						</tr>
					</table>
				</form>
			</div>
		</div>
		<script src="script.js"></script>
	</body>
</html>
