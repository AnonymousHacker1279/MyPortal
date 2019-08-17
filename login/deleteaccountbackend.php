<?php
session_start();

$link = mysqli_connect("localhost", "root", "", "MyPortalLogin");
            
$id = $_SESSION['id'];

$sql = "DELETE FROM users WHERE id='$id'";
if(mysqli_query($link, $sql)) {
	echo "Completed Successfuly";
	
	mysqli_close("MyPortalLogin");

	// Unset all of the session variables
	$_SESSION = array();
 
	// Destroy the session.
	session_destroy();
	header("location: ../index.html");
	exit;
} else {
	echo "Did not complete successfuly. ERROR: " . mysqli_error($link);
}
?>