<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

$username = $_SESSION['username'];
?>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Your Account</title>
		<link rel="stylesheet" href="style001.css" />
	</head>
	<body>

		<div class="container">
				<img src="/icon/code01.jpg" alt="code01" style="width:100%; height:180px; opacity: 0.4;" />
				<div class="centered" style="font-size:50px">Your Account</div>
		</div>

			<ul class="NavBar">
				<li class="NavBarItem"><a href="/login/welcome.php">Home</a></li>
				<li class="NavBarItem"><a href="/dashboard/dashboard.php">Dashboard</a></li>
				<li class="NavBarItem" style="float:right"><a href="../login/logout.php"><img src="/icon/logout.png" alt="logout" style="vertical-align:middle"/>Log Out</a></li>
				<li class="NavBarItem" style="float:right;"><a href="accountdetails.php">Account</a></li>
			</ul>

			<h2>Hello, <?php echo $username;?>. What would you like to change today?</h2>
		<div class="fill_container">
			<iframe src="accountsettingsmenu.html" width="100%" height="100%" frameborder="0" class="fill_container"></iframe>
		</div>
	</body>
</html>
