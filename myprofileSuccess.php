<?php 
session_start();
//check if session exists
if(isset($_SESSION["UID"])) {
?>

<body>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DeliTEN</title>

    <!-- Link our CSS file -->
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
				<li><a href="About_us.html"> About </a></li>
				
				
			</ul>
		</div>
	</nav>
<center>
<p style='color:black;'>
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
	$queryUpdate = "UPDATE USERS SET Nickname = '".$Nickname."', Password = '".$Password."', Email ='".$Email."'
	 WHERE UniID = '".$UniID."' ";
	
	$resultUpdate = mysqli_query($conn, $queryUpdate);
	
	if(!$resultUpdate){
		die("Query problems : ".mysqli_error($conn));
	}
	else{

		echo "Record has been updated into database.";
		echo "<br><br>";
		
	}
}

?>


Click <a href="my_profile.php">here </a>to My Profile
</p>

<body>
</html>	

<?php 
}
else
{
echo "No session exists or session has expired. Please 
log in again.<br>";
echo "<a href=login.html> Login </a>";
}
?>
</center>