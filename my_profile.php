<?php 
session_start();
//check if session exists
if(isset($_SESSION["UID"])) {
?>

<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "DELITEN";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
else 
{
	$queryView = "select * from USERS WHERE UniID = '".$_SESSION["UID"]."' ";
	$resultQ = $conn->query($queryView);
}
?>

<body>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DeliTEN</title>
	<link rel="icon" type="image/x-icon" href="icon.ico"> 
 
	
    <link rel="stylesheet" href="Style.css">
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
				<li><a href="Homepage.html">Home</a></li>
				<li><a href="Logout.php"> Logout </a></li>
				
				
			</ul>
		</div>
	</nav>
<br><br>
<?php
   if ($resultQ->num_rows > 0) {
	   while($row = $resultQ->fetch_assoc()) {
?>

<center>
<div class="form-container">
<p style='color:black;'>
<b>Nickname: <?php echo $row['Nickname']; ?><br><br></b>
<b>Password: <?php echo $row['Password']; ?><br><br></b>
<b>UNITEN ID: <?php echo $row['UniID']; ?><br><br></b>
<b>User Type: <?php echo $row['UserType']; ?><br><br></b>
<b>Email: <?php echo $row['Email']; ?><br><br></b></p>



<?php 
	   }
    } else {
		echo "<tr><td colspan='5'> NO data selected </td></tr>";
	}

?>

<?php
$conn->close();
?>

<a style="color:blue" href="menu.php">Back </a> 
<br><br>
<p style='color:black;'>
Click <a href="myprofileUpdate.php"> here </a> to EDIT profile 
<br><br></p>

</center>
</body>

<?php 
}
else
{
echo "No session exists or session has expired. Please 
log in again.<br>";
echo "<a href=Homepage.html> Login </a>";
}
?>
</div>
</body>
</html>