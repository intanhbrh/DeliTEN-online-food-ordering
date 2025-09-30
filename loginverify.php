<!DOCTYPE html>
<html>
<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> DeliTEN </title> 
		<link rel="icon" type="image/x-icon" href="test.ico"> 
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
				<li><a href=""> Menu</a></li>
			</ul>
		</div>
	</nav>
<center>
<h1><b style="color:black"; > Login Failed</h1></b>
<?php
//these codes is for login process
//check userid & pwd is matched 
//get form input 
$UniID = $_POST['UniID']; 
$Password = $_POST['Password']; 

//declare DB connection variables
$host = "localhost"; //host name
$user = "root"; //database userid 
$pass = ""; //database pwd
$db = "DELITEN";// please write your DB name 
// Create connection
$conn = new mysqli($host, $user, $pass, $db);
// Check connection
if ($conn->connect_error) { 
 //to check if DB connection IS NOT OK
 die("Connection failed: " . $conn->connect_error); 
}
else
{ 
//connection OK - get records for the selected User account
$queryCheck = "select * from USERS where UniID = '".$UniID."'";
$resultCheck = $conn->query($queryCheck); 
if ($resultCheck->num_rows == 0) { //if no record match
echo "<p style='color:red;'>UNITEN ID does not exists</p>";
echo "<p style='color:black;'>Click <a href='Homepage.html'> here </a> to LOGIN again.</p>";
}
else{
// record matched, get the data
while($row = $resultCheck->fetch_assoc()) {
if( $row["Password"] == $Password ) {
//in order to asign, use or destroy session
//calling the session_start() is compulsory
session_start();
//asign userid value to session userid
$_SESSION["UID"] = $UniID ;

$_SESSION["Nickname"] = $row["Nickname"];
//redirect to page menu.php
header("Location:menu.php");
}
else 
{
echo "<p style='color:red;'>Your UNITEN ID or password is incorrect</p>";
echo "<br>Click <a href='Homepage.html'> here </a> to LOGIN again.";
}
}
}
$conn->close();
}
?>
</center>
</body>
</html>

