<?php
include "connection.php";
if(isset($_POST['submit'])) {
	$secID = $_POST['sectionID'];
	$code = $_POST['section_code'];
	$course = $_POST['courseid'];

	$sql = "INSERT INTO section VALUES ('$secID', '$code', '$course')";
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
  		<li><a href="addnew-activity.php">Activities</a></li>
  		<li><a class="active" href="addnew-section.php">Sections</a></li>
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
		    	<th scope="col">Section Code</th>
		      	<th scope="col">Section Name</th>
		      	<th scope="col">Course ID</th>
		      	<th scope="col"></th>
		    </tr>
		  </thead>
		  <tbody>
		  		<?php
		  		include "connection.php";
		  		$sql = "SELECT * FROM `section`";
		  		$result = mysqli_query($conn, $sql);
		  		while ($row = mysqli_fetch_assoc($result)) {
		  			?>
		  			<tr>
				      <td><?php echo $row['sectionID'] ?></td>
				      <td><?php echo $row['section_code'] ?></td>
				      <td><?php echo $row['courseid'] ?></td>
				      <td>
				      	<a href="delete-section.php?id=<?php echo $row['sectionID'] ?>">remove</a>
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
								<label class="label">Section ID</label>
							</td>
							<td>
								<input type="text" class="form-control" name="sectionID"></div>
							</td>
						</tr>
						<tr>
							<td>
								<label class="label">Section Code</label>
							</td>
							<td>
								<input type="text" class="form-control" name="section_code">
							</td>
						</tr>
						<tr>
							<td>
								<label class="label">Course ID</label>
							</td>
							<td>
								<input type="text" class="form-control" name="courseid">
							</td>
						</tr>
						<tr>
							<td>
								<button type="submit" class="btn btn-info" name="submit">Insert</button>
							</td>
							<td>
								<input type="button" value="Return" onclick="Return()"/>
							</td>
						</tr>
					</table>
				</form>
			</div>
		</div>
		<script src="script.js"></script>
	</body>
</html>
