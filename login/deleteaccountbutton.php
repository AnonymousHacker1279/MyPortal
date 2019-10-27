<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

$username = $_SESSION['username'];
$id = $_SESSION['id'];
?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Delete Account</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../style001.css">
	<script>
		function MoveToAccountDeleteBackend() {
			window.location.href("deleteaccountbackend.php");
		}
    </script>
</head>
<body style="background-color: red;">
		<button onclick="MoveToAccountDeleteBackend()" type="button">DELETE ACCOUNT</button>
</body>
</html>
