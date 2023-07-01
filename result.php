<?php
		//check if there's a table in the query
		if(isset($_COOKIE['0'])){
		$firstTable = $_COOKIE['0'];
		$i = 1;
		//unused: Checks if there are other tables indicated
		while($i < 10){
			if(isset($_COOKIE[$i])){
				${"table$i"} = $_COOKIE[$i];
				}
			$i++;
			}
		}
		//check if there's a column in the query
		if(isset($_COOKIE['10'])){
		$i = 0;
		$j = 10;
		//checks if other columns are at play.
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
		//check if there's a value in the query
		if(isset($_COOKIE['20'])){
		$i = 0;
		$j = 20;
		//unused: Checks if other values are indicated.
		while($i < 10){
			if(isset($_COOKIE[$j])){
				${"value$i"} = $_COOKIE[$j];
				}
			$i++;
			$j++;
			}
		}
		//check if there's other parameters in the query
		if(isset($_COOKIE['30'])){
		$i = 0;
		$j = 30;
		//checks for more parameters.
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
	//These are modular queries
	//QueryC0 is for the column name.
	//This code under here is default, if the columnname is left blank
	$QueryC0 = "SELECT * FROM";
	if(isset($_COOKIE['10'])){
		//if there is a column name, it puts the value into where it should be.
		$QueryC0 = "SELECT `$column0` FROM";
		if($_COOKIE['10'] == "*" or $_COOKIE['10'] == ""){
			//if there is a * in the beginning of the column name, then it will do the default.
			$QueryC0 = "SELECT * FROM";
		}
	}
	//this sets the value one is looking for.
	if(isset($value0)){
		$QueryV0 = "WHERE `$column0` LIKE '%$value0%'";
		if($column0 = "*$_COOKIE[10]"){
			$QueryV0 = "WHERE `$column1` LIKE '%$value0%'";
		}
	}
	//other parameters are under here.
	if(isset($others0)){
		//checking if order by asc is to be used.
		if(strtolower(${"others0"}) == "ascending" or strtolower(${"others0"}) == "asc"){
			$queryO = "ORDER BY `$column0` ASC";
			//If * is first column, then it will use the second column name instead.
			if($column0 == "*"){
				$queryO = "ORDER BY `$column1` ASC";
			}
			//this one is for the limit if one is to be used.
			if(isset($others1)){
				//i = 1 
				$i = 1;
				while($i < 10){
					//it changes the limit value until it is equal to the desired limit.
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
		//Ditto above but for descending.
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
		//this one is merely for if you want to use limits without order.
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
	//the building of the modular code
	include "connection.php";
	//start
	if(isset($QueryC0)){
		//first module: If there is only a table name given
		$fullQuery = "$QueryC0 `$firstTable`";
		if(isset($QueryV0)){
			//second module: If there is a column name and value
			$fullQuery = "$QueryC0 `$firstTable` $QueryV0";
			if(isset($queryO)){
				//third module: If there is a column name, a value, and an order by value.
				$fullQuery = "$QueryC0 `$firstTable` $QueryV0 $queryO";
				if(isset($queryL)){
					//fourth module: if there is a column name, a value, an order by and a limit
					$fullQuery = "$QueryC0 `$firstTable` $QueryV0 $queryO $queryL";
				}
			}
			//if there is a column name, a value, and limit but no order by.
			else if(isset($queryL)){
				$fullQuery = "$QueryC0 `$firstTable` $QueryV0 $queryL";
			}
		}
		//if there is a column name and a limit but no value
		else if(isset($queryL)){
			$fullQuery = "$QueryC0 `$firstTable` $queryL";
		}
		//if there is a column name and an order by but no value
		else if(isset($queryO)){
			$fullQuery = "$QueryC0 `$firstTable` $queryO";
		}
	}
	//$fullQuery = "SELECT `$column0` FROM `$firstTable` WHERE `$column0` LIKE %`$value0`% ORDER BY `$column0` `others0`"
	//this under here shows what the full query 
	//if you were to use this search manually on
	//cmd
	echo "<h3>Query: ",$fullQuery,"</h3>";
	$result = mysqli_query($conn,$fullQuery);
	echo "<center><h2>Search Results</h2></center>";
	echo "<table>";
	//this code loops and keeps fetching the table query's rows.
	while($row = $result -> fetch_row()){
		//this variable counts how many rows there are on the specified table.
		$length = count($row);
		echo "<tr>";
		//then it loops while the variable j is not equal to the length
		for($j=0;$j != $length;$j++){
			//table goes on and on until it completes the command.
			echo "<td>";
			echo $row[$j];
			echo "</td>";
		}
		echo "</tr>";
	}
	//end.
	echo "</table>";
	?>
	<input type="button" value="Return" onclick="searchReturn()" style="font-size:20px">
<script src="script.js"></script>
</body>
</html>