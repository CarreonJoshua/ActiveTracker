<?php
		//check if there's a table
		if(isset($_COOKIE['0'])){
		$firstTable = $_COOKIE['0'];
		$i = 1;
		while($i < 10){
			if(isset($_COOKIE[$i])){
				${"table$i"} = $_COOKIE[$i];
				}
			$i++;
			}
		}
		//check if there's a column
		if(isset($_COOKIE['10'])){
		$i = 0;
		$j = 10;
		while($i < 10){
			if(isset($_COOKIE[$j])){
				${"column$i"} = $_COOKIE[$j];
				}
			$i++;
			$j++;
			}
		$column0 = $_COOKIE[10];
		if($column0 == "*"){
			$column0 = "*$_COOKIE[10]";
		}

		}
		//check if there's a value
		if(isset($_COOKIE['20'])){
		$i = 0;
		$j = 20;
		while($i < 10){
			if(isset($_COOKIE[$j])){
				${"value$i"} = $_COOKIE[$j];
				}
			$i++;
			$j++;
			}
		}
		//check if there's other parameters
		if(isset($_COOKIE['30'])){
		$i = 0;
		$j = 30;
		while($i < 10){
			if(isset($_COOKIE[$j])){
				${"others$i"} = $_COOKIE[$j];
				}
			$i++;
			$j++;
			}
		}
	?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="style/style.css">
</head>
<body>
	<ul style="width:100%">
		<center>
  		<li><a href="index-change.php">Submissions</a></li>
  		<li><a href="addnew-student.php">Students</a></li>
  		<li><a href="addnew-activity.php">Activities</a></li>
  		<li><a href="addnew-section.php">Sections & Subjects</a></li>
  		<li><a class="active" href="searchbar.php">Search...</a></li>
  		</center>
	</ul>
	<?php 
	//if(isset($_COOKIE['0'])){
	//	$query0 = "`$firstTable`";
	//	$table = true;
	//}
	//if(isset($_COOKIE['10'])){
	//	$i = 0;
	//	while($i < 10){
	//		if(isset(${"column$i"})){
	//			${"queryC$i"} = "SELECT `${"column$i"}`";
	//		}
	//	}
	$QueryC0 = "SELECT * FROM";
	if(isset($_COOKIE['10'])){
		$QueryC0 = "SELECT `$column0` FROM";
		if($_COOKIE['10'] == "*" or $_COOKIE['10'] == ""){
			$QueryC0 = "SELECT * FROM";
		}
	}
	if(isset($value0)){
		$QueryV0 = "WHERE `$column0` LIKE '%$value0%'";
		if($column0 = "*$_COOKIE[10]"){
			$QueryV0 = "WHERE `$column1` LIKE '%$value0%'";
		}
	}
	if(isset($others0)){
		if(strtolower(${"others0"}) == "ascending" or strtolower(${"others0"}) == "asc"){
			$queryO = "ORDER BY `$column0` ASC";
			if($column0 == "*"){
				$queryO = "ORDER BY `$column1` ASC";
			}
			if(isset($others1)){
				$i = 1;
				while($i < 10){
					if(strtolower("$others1") == "limit_$i"){
						$queryL = "LIMIT $i";
						$i++;
					}
					else{
						$i++;
					}
				}
			}
		}
		else if(strtolower(${"others0"}) == "descending" or strtolower(${"others0"}) == "desc"){
				$queryO = "ORDER BY `$column0` DESC";
				if($column0 == "*"){
					$queryO = "ORDER BY `$column1` DESC";
				}
				if(isset($others1)){
					$i = 1;
					while($i < 10){
						if(strtolower("$others1") == "limit_$i"){
							$queryL = " LIMIT $i";
							$i++;
						}
						else{
							$i++;
						}
					}
				}
			}

		else{
			$i = 0;
			while($i < 10){
				if(strtolower("$others0") == "limit_$i"){
					$queryL = " LIMIT $i";
					$i++;
				}
				else{
					$i++;
				}
			}
		}
	}
	include "connection.php";
	if(isset($QueryC0)){
		$fullQuery = "$QueryC0 `$firstTable`";
		if(isset($QueryV0)){
			$fullQuery = "$QueryC0 `$firstTable` $QueryV0";
			if(isset($queryO)){
				$fullQuery = "$QueryC0 `$firstTable` $QueryV0 $queryO";
				if(isset($queryL)){
					$fullQuery = "$QueryC0 `$firstTable` $QueryV0 $queryO $queryL";
				}
			}
			else if(isset($queryL)){
				$fullQuery = "$QueryC0 `$firstTable` $QueryV0 $queryL";
			}
		}
		else if(isset($queryL)){
			$fullQuery = "$QueryC0 `$firstTable` $queryL";
		}
		else if(isset($queryO)){
			$fullQuery = "$QueryC0 `$firstTable` $queryO";
		}
	}
	//$fullQuery = "SELECT `$column0` FROM `$firstTable` WHERE `$column0` LIKE %`$value0`% ORDER BY `$column0` `others0`"
	echo "<h3>Query: ",$fullQuery,"</h3>";
	$result = mysqli_query($conn,$fullQuery);
	echo "<center><h2>Search Results</h2></center>";
	echo "<table>";
	while($row = $result -> fetch_row()){
		$length = count($row);
		echo "<tr>";
		for($j=0;$j != $length;$j++){
			echo "<td>";
			echo $row[$j];
			echo "</td>";
		}
		echo "</tr>";
	}
	echo "</table>";
	?>
	<input type="button" value="Return" onclick="searchReturn()" style="font-size:20px">
<script src="script.js"></script>
</body>
</html>