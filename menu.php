<?php
session_start();

if(isset($_SESSION["UID"])) {
	
?>
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
				<li><a href="my_profile.php">My Profile</a></li>
				<li><a href="Logout.php"> Logout</a></li>
				
				
			</ul>
		</div>
	</nav>
<center>	
<h2><br><p style='color:black;'>Hi, <i style="color:pink;"><?php echo $_SESSION["Nickname"];?></i><br><p style='color:black;'>Welcome to DeliTEN</h2></p>
<div class="form-container">

<p style='color:black;'> Choose : </p>
<br>
<?php
     if ($_SESSION["UserType"] == "Customer" OR $_SESSION["UserType"] == "customer") {
?>
    <a href = "food.html"> Food Menu </a> <br><br>
	<a href = "my_profile.php"> My Profile </a> <br><br>
    <a href = "DeleteWishesViewUser.php"> View Order Status </a> <br><br>	
<?php
	}
	else {
?>
	<a href = "my_profile.php"> My Profile </a> <br><br>
	<a href = "food.html"> View Food Menu </a> <br><br>
	<a href = "FoodList.php"> Add Food Menu  </a> <br><br>
	<a href = "userView.php"> View Customer List </a> <br><br>
<?php
    }
?>
</body>
</html>
<?php
}
else
{
	echo "No session exists or session has expired. Please log in again.<br>";
	echo "<a href=Homepage.html> Login </a>";
}
?>
</div>
</center>