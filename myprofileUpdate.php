<?php 
session_start();
//check if session exists
if(isset($_SESSION["UID"])) {
?>
<link rel="stylesheet" type="text/css" href="Style.css">

<body>

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
	
<?php


$host = "localhost";
$user = "root";
$pass = "";
$db = "DELITEN";

$conn = new mysqli($host, $user, $pass, $db);

if($conn->connect_error){
  die("Connection failed: " . $conn->connect_error);
}
else
{
  $queryView = "select * from USERS where UniID = '".$_SESSION["UID"]."'";
  $resultQ = $conn->query($queryView);
  
  if ($resultQ->num_rows> 0)
  {
    while ($row = $resultQ->fetch_assoc())
{

?>
<center>
<div class="form-container">
<p style='color:black;'> Selected Profile Details : </p>
<form action="myprofileSuccess.php" name="UpdateSuccess"  method="POST">

<br><br>
<p style='color:black;'>
<b>UNITEN ID: <?php echo $row['UniID'];?></b>

<br><br>
<b>Nickname: <input type="text" name="Nickname" value="<?php echo $row['Nickname']; ?>" size="20" maxlength="20" required></b>

<br><br>
<b>Change Password: <input type="password" name="Password" value="<?php echo $row['Password']; ?>" size="16" maxlength="10" required></b>

<br><br>
<b>Email: <input type="text" name="Email" value="<?php echo $row['Email']; ?>" size="20" maxlength="25" required></b>

<br>
<input type="hidden" name="UniID" value="<?php echo $row['UniID'];?>"></p>

<br>
<button type="submit" class="btn">Update Profile Details</button>

</div>
</form>
</center>
<?php
}
  }
}
$conn->close();
?>

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