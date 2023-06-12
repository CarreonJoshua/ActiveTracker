<?php
include "connection.php";
if(isset($_POST['submit'])) {
	$studID = $_POST['studID'];
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$section = $_POST['section'];
	$contactID = $_POST['contactID'];
	$gender = $_POST['gender'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$address = $_POST['address'];


	$sql = "INSERT INTO students VALUES ('$studID', '$firstName', '$lastName', '$section', '$gender')";
	$result = mysqli_query($conn, $sql);
	if($result) {
		$sql = "INSERT INTO contact VALUES ('$contactID', '$studID', '$phone', '$email', '$address')";
		$result = mysqli_query($conn, $sql);
		if($result)
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
  		<li><a class="active" href="addnew-student.php">Students</a></li>
  		<li><a href="addnew-activity.php">Activities</a></li>
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
		    	<th>Student ID</th>
		    	<th>Contact ID</th>
		      	<th>First Name</th>
		      	<th>Last Name</th>
		      	<th>Section</th>
		      	<th>gender</th>
		      	<th>Phone Number</th>
		      	<th>Email</th>
		      	<th>Address</th>
		      	<th colspan="2"></th>
		    </tr>
		  </thead>
		  <tbody>
		  		<?php
		  		include "connection.php";
		  		$sql = "SELECT students.studID, firstName, lastName, section, gender, contactID, phoneNum, email, address  FROM `students` LEFT JOIN contact ON students.studID = contact.studID";
		  		$result = mysqli_query($conn, $sql);
		  		while ($row = mysqli_fetch_assoc($result)) {
		  			?>
		  			<tr>
				      <td><?php echo $row['studID'] ?></td>
				      <td><?php echo $row['contactID'] ?></td>
				      <td><?php echo $row['firstName'] ?></td>
				      <td><?php echo $row['lastName'] ?></td>
				      <td><?php echo $row['section'] ?></td>
				      <td><?php echo $row['gender'] ?></td>
					  <td><?php echo $row['phoneNum'] ?></td>
				      <td><?php echo $row['email'] ?></td>
				      <td><?php echo $row['address'] ?></td>
				      <td><a href="update-students.php?id=<?php echo $row['studID'] ?>&id2=<?php echo $row['contactID'] ?>">update</a></td>
				      <td><a href="delete-students.php?id=<?php echo $row['studID'] ?>&id2=<?php echo $row['contactID'] ?>">remove</a></td>
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
								<label class="label">Student ID</label>
							</td>
							<td>
								<input type="text" class="form-control" name="studID">
							</td>
							<td>
								<label class="label">Contact ID</label>
							</td>
							<td>
								<input type="text" class="form-control" name="contactID">
							</td>
						</tr>
						<tr>
							<td>
								<label class="label">First Name</label>
							</td>
							<td>
								<input type="text" class="form-control" name="firstName">
							</td>
							<td>
								<label class="label">Phone Number</label>
							</td>
							<td>
								<input type="text" class="form-control" name="phone">
							</td>
						</tr>
						<tr>
							<td>
								<label class="label">Last Name</label>
							</td>
							<td>
								<input type="text" class="form-control" name="lastName">	
							</td>
							<td>
								<label class="label">Email</label>
							</td>
							<td>
								<input type="text" class="form-control" name="email">
							</td>
						</tr>
						<tr>
							<td>
								<label class="label">Section ID</label>
							</td>
							<td>
								<input type="text" class="form-control" name="section">
							</td>
							<td>
								<label class="label">Address</label>
							</td>
							<td>
								<input type="text" class="form-control" name="address">
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
							<td>
								<center>
								<button type="submit" class="btn btn-info" name="submit">Insert</button>
								<input type="button" value="Return" onclick="Return()"/>
								</center>
							</td>
							<td>
							</td>
						</tr>
					</table>						
				</form>
			</div>
		</div>
		<script src="script.js"></script>
	</body>
</html>
