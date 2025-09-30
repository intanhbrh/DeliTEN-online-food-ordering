<?php
session_start();

if(isset($_SESSION["UID"])) {
	
?>

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
				<li><a href="my_profile.html">My Profile</a></li>
				<li><a href="Logout.php"> Logout</a></li>
				
				
			</ul>
		</div>
	</nav>
<center>	
<br>
<h2><p style='color:black;'>  Welcome to DeliTEN,<br> Hi <i style="color:pink;"><?php echo $_SESSION["UID"];?> </i></h2></p>


<p style='color:black;'> Choose your menu : </p>
<br>
<?php
    if ($_SESSION["UserType"] == "Admin" OR $_SESSION["UserType"] == "admin") {
?>
        
		<a href = "Register.php"> View Food Menu </a> <br><br>
	    <a href = "Update_Profile.php"> Edit Customer List </a> <br><br>
	    <a href = "DeleteUserView.php"> Add Food Menu  </a> <br><br>
	    <a href = "User_View.php"> View Customer List </a> <br><br>
	    <a href = "ViewWishes.php"> Add Wishes List </a> <br><br>

	
<?php
	}
	else {
?>
    <a href = "my_profile.php"> My Profile </a> <br><br>
    <a href = "Register.php"> Register New User </a> <br><br>
	<a href = "AddWishes.php"> Add Wishes </a> <br><br>
    <a href = "DeleteWishesViewUser.php"> Delete Wishes Records </a> <br><br>
	<a href = "ViewWishes.php"> View Wishes List </a> <br><br>
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
</center>