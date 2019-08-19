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
	<link rel="stylesheet" href="../style001.css">
	<script>
		function MoveToAccountDeleteBackend() {
			window.location("deleteaccountbackend.php");
		}
    </script>
</head>
<body style="background-color: red;">
		<button onclick="MoveToAccountDeleteBackend()" type="button">DELETE ACCOUNT</button>
</body>
</html>
