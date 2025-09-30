<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> DeliTEN </title> 
		<link rel="icon" type="image/x-icon" href="icon.ico"> 

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
				<li><a href="About_us.html"> About</a></li>
			</ul>
		</div>
	</nav>
<link rel="stylesheet" type="text/css" href="Style.css">

<body>

<form action="Register_Success.php" method="post">
<center>
<br>
<div class="form-container">
<h2><b style="color:black";> REGISTER </h2></b>
 <p style="color:black";>Please fill in this form to create an account.</p>

<b style="color:black"; >
<label for="Nickname">Nickname:  <input type="text" name="Nickname" size="20" maxlength="30" required></label><br><br>
<label for="UniID">Your UNITEN ID:  <input type="text" name="UniID" size="20" maxlength="20" required></label><br><br>
<label for="password">Password:  <input type="password" name="Password" size="10" maxlength="10" required></label><br><br>
<label for="UserType">User Type:  <input type="text" name="UserType" size="10" maxlength="10" required></label><br><br>
<label for="Email">Email:  <input type="email" name="Email" size="20" maxlength="20" required></label><br><br></b>
<button type="submit" class="btn">Register</button>
<br><br>
<p style="color:black"; >Already Registered?<a style="color:blue" href="Homepage.html"> Sign In </a></p>
</div>
</center>
</form>
</body>
</html>