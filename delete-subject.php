<?php 
include "connection.php";
$id = $_GET['id'];
$sql = "DELETE FROM subject WHERE subjectCode = '$id'";
$result = mysqli_query($conn, $sql);
if($result){
	header("Location: addnew-section.php");
}
?>