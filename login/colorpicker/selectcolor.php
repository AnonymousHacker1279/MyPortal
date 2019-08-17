<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

$usercolor = $_POST["HexValue"];

$_SESSION['favcolor'] = $usercolor;

$_SESSION["id"] = $id;

require_once "config.php";

$sql = "UPDATE users SET favcolor='$usercolor' WHERE id='$id'";

if ($result = mysqli_query($link, $sql)) {
	echo "All good! Query Result: $result";
	header('location: ../accountdetails.php');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($link);
}

mysqli_close($link);
?>