<?php 
session_start();
//check if session exists
if(isset($_SESSION["UID"])) {
?>

<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "DeliTEN";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
else 
{
	$queryView = "select * from ORDER ORDER BY DateTime DESC";
	$resultQ = $conn->query($queryView);
}
?>
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
	<br>
<center>
<style>
table{
	font-family: arial, sans-serif;
	border-collapse: collapse;
	width: 100%;
	color: black;
}
td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}
tr:nth-child(even) {
  background-color: #dddddd;
}
 </style>
<table>
<tr>
  <th> Food ID </th>
  <th> Food Name</th>
  <th> Food Price </th>
  <th> Date and Time </th>
  <th> Availability </th>
</tr>

<?php
   if ($resultQ->num_rows > 0) {
	   while($row = $resultQ->fetch_assoc()) {
?>
<tr>
       <td><?php echo $row['FoodID']; ?></td>
	   <td><?php echo $row['FoodName ']; ?></td>
	   <td><?php echo $row['Picture']; ?></td>
	   <td><?php echo $row['OrderDate']; ?></td>
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

<p style='color:black;'>
Click <a href="menu.php"> here </a> to go MENU
<br><br>
Click <a href="AddFood.php"> here </a> to ADD more 
<br><br>
<?php
    if ($_SESSION["UserType"] == "Admin" OR $_SESSION["UserType"] == "admin") {
?>
    Click <a href="EditFood.php"> here </a> to EDIT food list 
<?php
    } else {
?>
    Click <a href="EditfoodCustomer.php"> here </a> to EDIT food list
<?php
    }
?>
<br><br>
<?php
    if ($_SESSION["UserType"] == "Admin" OR $_SESSION["UserType"] == "admin") {
?>

    Click <a href="DeletefoodView.php"> here </a> to DELETE customer's food list 
<?php
    } else {
?>
<br><br>
    Click <a href="DeletefoodCustomer.php"> here </a> to DELETE customer's food list 
<?php
    }
?>
<br><br>
Click <a href="foodsearch.php"> here </a> to SEARCH food list 
<br><br>
</p>
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