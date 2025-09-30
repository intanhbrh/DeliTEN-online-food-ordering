<?php 
session_start();
//check if session exists
if(isset($_SESSION["UID"])) {
?>

<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "MY_EGUESTBOOK";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
else 
{
	$queryView = "select * from WISHES ORDER BY DateTime DESC";
	$resultQ = $conn->query($queryView);
}
?>
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> DeliTEN </title> 
	<link rel="icon" type="image/x-icon" href="icon.ico"> 
	<link rel="stylesheet" type="text/css" href="admincss.css">
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
<?php
   if ($resultQ->num_rows > 0) {
	   while($row = $resultQ->fetch_assoc()) {
?>
<tr>
       <td><?php echo $row['ID']; ?></td>
	   <td><?php echo $row['Wishes']; ?></td>
	   <td><?php echo $row['Picture']; ?></td>
	   <td><?php echo $row['DateTime']; ?></td>
	   <td><?php echo $row['Nickname']; ?></td>
</tr>
<?php 
	   }
    } else {
		echo "<tr><td colspan='7'> NO data selected </td></tr>";
	}

?>
</table>
<?php
$conn->close();
?>

<br><br>
Click <a href="menu.php"> here </a> to go MENU
<br><br>
Click <a href="AddWishes.php"> here </a> to ADD another a wish 
<br><br>
<?php
    if ($_SESSION["UserType"] == "Admin" OR $_SESSION["UserType"] == "admin") {
?>
    Click <a href="EditWishes.php"> here </a> to EDIT a wish 
<?php
    } else {
?>
    Click <a href="EditWishesUser.php"> here </a> to EDIT a wish
<?php
    }
?>
<br><br>
<?php
    if ($_SESSION["UserType"] == "Admin" OR $_SESSION["UserType"] == "admin") {
?>
    Click <a href="DeleteWishesView.php"> here </a> to DELETE a wish 
<?php
    } else {
?>
    Click <a href="DeleteWishesViewUser.php"> here </a> to DELETE a wish 
<?php
    }
?>
<br><br>
Click <a href="SearchWishes.php"> here </a> to SEARCH a wish 
<br><br>

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
</center>