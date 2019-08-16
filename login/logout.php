<?php
// Initialize the session
session_start();
 
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();
?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Successfully Logged Out</title>
	<link rel="stylesheet" href="../style001.css">
	<script>
		function GoToIndex() {
			window.location.replace("../index.html");
		}
	</script>
</head>
<body>
	<h1 style="text-align:center">You have successfully logged out of MyPortal.</h1>
	<br />
	<button onclick="GoToIndex()" type="button" class="ActionButton">Return to MyPortal</button>
</body>
</html>
