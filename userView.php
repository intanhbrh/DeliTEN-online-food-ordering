<?php
session_start();
//check if session exists
if(isset($_SESSION["UID"])) {
?>
<!DOCTYPE html>
<html> 
<?php
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "DELITEN";
	
	$conn = new mysqli ($host, $user, $pass, $db);
	
	if ($conn->connect_error) {
		die ("Connection failed: ".$conn->connect_error);
	} else 
	{
		$queryView = "select * from PETS";
		$resultQ = $conn->query($queryView); 
	}
?>

<body>
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
				<li><a href="my_profile.php">My Profile</a></li>
				<li><a href="Logout.php"> Logout </a></li>
				
				
			</ul>
		</div>
	</nav>
		
<center>
<table border = "2">
<p style='color:black;'>
	<tr>
		<th><p style='color:black;'>UNITEN ID</th>
		<th><p style='color:black;'>NickName</th>
		<th><p style='color:black;'>Food Name</th>
		<th><p style='color:black;'>Food Price</th>
		<th><p style='color:black;'>Order Date</th>
		<th><p style='color:black;'>Order Status</th> 
	</tr></p>
<?php 
	if ($resultQ->num_rows > 0) {
		while($row = $resultQ->fetch_assoc()) {
?>
<tr> 
		<td><?php echo $row['UniID'];?></td>
		<td><?php echo $row['Nickname'];?></td>
		<td><?php echo $row['FoodName'];?></td>
		<td>RM<?php echo $row['FoodPrice'];?></td>
		<td><?php echo $row['OrderDate'];?></td>
		
</tr>
<?php
		}
	} else {
		echo "<tr><td colspan ='7'>No data selected!!</td></tr>";
	}
?>
</table>
<?php
	$conn->close();
?><p style='color:black;'>
<br>Click <a href = "addfood.php">here</a> to ADD another record
<br><br>Click <a href = "Editview.php" >here</a> to UPDATE a record
<br><br>Click <a href = "DeleteList.php">here</a> to DELETE a record
<br><br>Click <a href = "menu.php">here</a> to Menu page
</p>
</body>
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