<?php 
include "connection.php";
$id = $_GET['id'];
$id2 = $_GET['id2'];
$sql = "DELETE FROM contact WHERE contactID = '$id2'";
$result = mysqli_query($conn, $sql);
if($result){
	$sql = "DELETE FROM students WHERE studID = '$id'";
	$result = mysqli_query($conn, $sql);
	if($result){
		header("Location: addnew-student.php");
	}
}
?>