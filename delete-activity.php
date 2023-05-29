<?php 
include "connection.php";
$id = $_GET['id'];
$sql = "DELETE FROM activity WHERE activityNum = '$id'";
$result = mysqli_query($conn, $sql);
if($result){
	header("Location: addnew-activity.php");
}
?>