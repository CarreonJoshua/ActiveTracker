<?php 
include "connection.php";
$id = $_GET['id'];
$sql = "DELETE FROM submission WHERE submitID = '$id'";
$result = mysqli_query($conn, $sql);
if($result){
	header("Location: index-change.php?msg=4");
}
?>