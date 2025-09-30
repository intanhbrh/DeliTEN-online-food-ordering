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
				<li><a href=""> Menu</a></li>
			</ul>
		</div>
	</nav>
<center>
<p style='color:black;'>
<?php
session_start();
if (isset($_SESSION["UID"]))
{
session_unset();
session_destroy();
echo "<br><p style='color:red;'>You have successfully logged
out.</p>";
echo "<p style='color:black;'>Click <a href='Homepage.html'> here </a> to LOGIN again.</p>";
}
else {
echo " No session exists or session is expired. Please log in
again";
echo "<br>Click <a href='Homepage.html'> here </a> to LOGIN again.";
}
?></p>