<html>
<head>
</head>
<body>
<h1>Enter player tag to search for their information</h1>
<form action="" method="post">
<label for="Tag">Tag</label>
<input type="text" name="Tag" id="Tag">
<br/>

<label for="search">Go!</label>
<input type="submit" name="search" id="search">
<br/>

<?php
$Tag="";
if($_SERVER["REQUEST_METHOD"]== "POST") {
	$conn = new mysqli('localhost', 'root', '', 'melee dbms project');
	if ($conn->connect_error) {
		echo "connection failed";
		die("Connection failed: " . $conn->connect_error);
	}

	$Tag=$_POST['Tag'];
	$resultSet = $conn->query("select * from player where Tag='$Tag'");
	if ($resultSet->num_rows != 0) {
		while ($rows = $resultSet->fetch_assoc()) {

			$Tag = $rows['Tag'];
			$Player_Name= $rows['Player_Name'];
			$Region = $rows['Region'];
			$City = $rows['City'];
			$State_Province_Country = $rows['State_Province_Country'];
			echo "<p>Tag: $Tag <br/>Player Name: $Player_Name<br/>Region: $Region<br/>City: $City<br/>State, Province, or Country: $State_Province_Country</p>";
		}
	}
	else {
		echo "<p>Please enter an existing player's tag.<p>";
	}
}
else {
}
?>

<h1>Enter a number from 1 to 100 to find out which players have been ranked in that position.</h1>
<form action="" method="post">
<label for="Rank">Rank</label>
<input type="number" name="Rank" id="Rank">
<br/>

<label for="search">Go!</label>
<input type="submit" name="search" id="search">
<br/>

<?php
$Rank="";
if($_SERVER["REQUEST_METHOD"]== "POST") {
	
	$Rank=$_POST['Rank'];
	$resultSet = $conn->query("select * from ranked_in where rank='$Rank' order by year");
	if ($resultSet->num_rows != 0) {
		while ($rows = $resultSet->fetch_assoc()) {

			$Tag = $rows['Tag'];
			$Year= $rows['Year'];
			$Rank = $rows['Rank'];
			echo "<p>Tag: $Tag <br/>Year: $Year<br/>Rank: $Rank</p>";
		}
	}
	else {
		echo "<p>Please enter a number between 1 and 100.<p>";
	}
}
else {
}
?>

<h1>Enter a tournament name to see the recorded results for that tournament</h1>
<form action="" method="post">
<label for="Tourney_Name">Tournament name</label>
<input type="text" name="Tourney_Name" id="Tourney_Name">
<br/>

<label for="search">Go!</label>
<input type="submit" name="search" id="search">
<br/>

<?php
$Tourney_Name="";
if($_SERVER["REQUEST_METHOD"]== "POST") {
	
	$Tourney_Name=$_POST['Tourney_Name'];
	$resultSet = $conn->query("select * from attends where Tourney_Name='$Tourney_Name' order by Place");
	if ($resultSet->num_rows != 0) {
		echo "<p>$Tourney_Name results:<br/><p>";
		while ($rows = $resultSet->fetch_assoc()) {

			$Tag = $rows['Tag'];
			$Place = $rows['Place'];
			echo "$Tag: $Place<br/>";
		}
	}
	else {
		echo "<p>Please enter an existing tournament name.<p>";
	}
}
else {
}
?>

<h1>Enter a team's name to see all of their current players.</h1>
<form action="" method="post">
<label for="Team_Name">Team name</label>
<input type="text" name="Team_Name" id="Team_Name">
<br/>

<label for="search">Go!</label>
<input type="submit" name="search" id="search">
<br/>

<?php
$Team_Name="";
if($_SERVER["REQUEST_METHOD"]== "POST") {
	
	$Team_Name=$_POST['Team_Name'];
	$resultSet = $conn->query("select * from part_of where Team_Name='$Team_Name'");
	if ($resultSet->num_rows != 0) {
		echo "<p>$Team_Name members:<br/><p>";
		while ($rows = $resultSet->fetch_assoc()) {

			$Tag = $rows['Tag'];
			echo "$Tag<br/>";
		}
	}
	else {
		echo "<p>Please enter an existing team.<p>";
	}
}
else {
}
?>

<h1>Enter a character's name to see which players main that character.</h1>
<form action="" method="post">
<label for="Character_Name">Character's name</label>
<input type="text" name="Character_Name" id="Character_Name">
<br/>

<label for="search">Go!</label>
<input type="submit" name="search" id="search">
<br/>

<?php
$Character_Name="";
if($_SERVER["REQUEST_METHOD"]== "POST") {
	
	$Character_Name=$_POST['Character_Name'];
	$resultSet = $conn->query("select * from mains where Character_Name='$Character_Name'");
	if ($resultSet->num_rows != 0) {
		echo "<p>Players who main $Character_Name:<br/><p>";
		while ($rows = $resultSet->fetch_assoc()) {

			$Tag = $rows['Tag'];
			echo "$Tag<br/>";
		}
	}
	else {
		echo "<p>Please enter an existing character.<p>";
	}
}
else {
}
?>

</form>
</body>
</html> 