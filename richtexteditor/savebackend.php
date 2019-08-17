<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

chdir("/var/www/html/filestorage/filemanager/files/");

$data = $_SESSION['rtesave'];

$directory_post = $_POST['directory'];

$filename_post = $_POST['filename'];

$directory = "/var/www/html/filestorage/filemanager/files/" . $directory_post . "/";

$filename = $directory . $filename_post . ".html";

if (!file_exists($directory)) {
	mkdir($directory, 0777);
	file_put_contents($filename, $data);
	unset($_SESSION['rtesave']);
	header("location: /richtexteditor/index.php");
	exit;
} else {
	file_put_contents($filename, $data);
	unset($_SESSION['rtesave']);
	header("location: /richtexteditor/index.php");
	exit;
}

?>