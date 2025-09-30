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
		$queryView = "select * from ORDER";
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

<form action="Delete.php" name="DeleteForm" method="POST" onsubmit="return confirm('Are you sure to delete this record?')">

<table border ="2">
	<tr>
	<th> <p style='color:black;'>Choose</th>
	<th><p style='color:black;'>UNITEN ID</th>
		<th><p style='color:black;'>NickName</th>
		<th><p style='color:black;'>Food Name</th>
		<th><p style='color:black;'>Food Price</th>
		<th><p style='color:black;'>Order Date</th>
		<th><p style='color:black;'>Order Status</th>
	</tr>
<?php 
	if ($resultQ->num_rows > 0) {
		while($row = $resultQ->fetch_assoc()) {
?>
<tr> 
		<td><input type="radio" name="UniID" value="<?php echo $row['UniID']; ?>"> </td>
		<td><?php echo $row['UniID'];?></td>
		<td><?php echo $row['Nickname'];?></td>
		<td><?php echo $row['FoodName'];?></td>
		<td>RM<?php echo $row['FoodPrice'];?></td>
		<td><?php echo $row['OrderDate'];?></td>
		<td><?php echo $row['OrderStatus'];?></td>
		
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
?>
<br>
<input type= "Submit" value="Delete chosen list">
</form>

<br><br>
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