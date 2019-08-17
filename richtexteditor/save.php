<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

$_SESSION['rtesave'] = $_POST['content'];

?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Save Document</title>
	<link rel="stylesheet" href="../style001.css">
</head>
<body style="background-color: azure;">
	<h1>Save your document</h1>
	<h3 style="text-align:center;">The documents can be viewed or downloaded from the Team File Manager application.</h3>
	<br />
	<p style="text-align:center;">Please enter the target directory and filename. Note that directory paths are relative to the "files" folder within the Team File Manager application. Also, if a path doesn't exist, it will be created. Please leave the directory field blank if you want the file to be in the main directory. Filenames will always have the .html extension, due to being formatted in HTML.</p>
	<form action="savebackend.php" method="post" style="text-align:center;">
		<input type="text" name="directory" placeholder="Directory" />
		<input type="text" name="filename" placeholder="File Name" />
		<input type="submit" name="submitbutton" value="Submit" />
	</form>

	<br />
	
	<div class="container">
		<a href="/filestorage/filemanager/filemanager.php" target="_blank"><img src="../dashboard/filemanager.png" alt="filemanager" style="vertical-align:middle" />Team File Manager</a>
	</div>

	<br />
	
	<p style="text-align:center;">Please note that if you close this page, your document will be lost. Also, going back will destroy the page. Copy the data from the saved file back into the editor to continue working.</p>
</body>
</html>