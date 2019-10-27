<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

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
	echo '<script>',
        'window.top.location.reload();',
        '</script>';
	exit;
} else {
	echo "Did not complete successfuly. ERROR: " . mysqli_error($link);
}
?>