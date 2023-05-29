<?php 
include "connection.php";
$id = $_GET['id'];
$sql = "DELETE FROM section WHERE sectionID = '$id'";
$result = mysqli_query($conn, $sql);
if($result){
	header("Location: addnew-section.php");
}
?>