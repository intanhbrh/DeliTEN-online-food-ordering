<!DOCTYPE html>
<html>
<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> DeliTEN </title> 
		<link rel="icon" type="image/x-icon" href="icon.ico"> 
	<link rel="stylesheet" type="text/css" href="Style.css">
</head>	

<body>
<div class="aside-left">
</div>

<div class="container">
	<nav class="header">
		<div class="logo">
			<h1> DeliTEN. </h1>
		</div>
		<div class="menu">
			<ul>
				<li><a href="">Home</a></li>
				<li><a href=""> About</a></li>
			</ul>
		</div>
	</nav>
<center>
<?php

	$Nickname=$_POST["Nickname"];
	$UniID=$_POST["UniID"];
	$Password=$_POST["Password"];
	$UserType=$_POST["UserType"];
	$Email=$_POST["Email"];
	
	$host ="localhost";
	$user = "root";
	$pass = "";
	$db ="DELITEN";
	
	$conn = new mysqli($host,$user, $pass, $db);
	
if($conn->connect_error){
	die("Connection failed: " .$conn->connect_error);
}

else 
{
	$queryInsert = "insert into USERS (Nickname, Password, UniID, UserType, Email )
	values
	( '".$Nickname."','".$Password."', '".$UniID."','".$UserType."', '".$Email."' )";
	
	if ($conn->query($queryInsert) === TRUE) {
		echo "<br><br>";
		echo "<p style='color:blue;'>Success insert User record</p>";
	} else {
		echo "<p style='color:red;'>Error: Invalid query " . $conn->error. "</p>";
	}
	
}
$conn->close();
?>

<p><a href="Homepage.html">Login</a></p>
</center>
</body>
</html>	