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

<!DOCTYPE HTML>
<head>
	<title>MyPortal Dashboard</title>
	<link rel="stylesheet" href="../style001.css">
</head>
<body>
	<div class="container">
		<img src="/icon/code01.jpg" alt="code01" style="width:100%; height:180px; opacity: 0.4;" />
		<div class="centered" style="font-size:50px">Dashboard</div>
    </div>

	<ul>
		<li><a href="/login/welcome.php">Home</a></li>
		<li><a href="/dashboard/dashboard.php">Dashboard</a></li>
		<li style="float:right"><a href="/login/logout.php"><img src="/icon/logout.png" alt="logout" style="vertical-align:middle"/>Log Out</a></li>
		<li style="float:right;"><a href="../accountdetails.php">Account</a></li>
	</ul>

	<br />
	<br />

	<div class="container">
		<ul>
			<li><a href="/filestorage/filemanager/filemanager.php"><img src="filemanager.png" alt="filemanager" style="vertical-align:middle" />Team File Manager</a></li>
			<li><a href="/richtexteditor/index.php"><img src="texteditor.png" alt="texteditor" style="vertical-align:middle" />Rich Text Editor</a></li>
			<li><a href="/code_editor/ace/index.html"><img src="codeeditor.png" alt="code_editor" style="vertical-align:middle" /> Code Editor</a></li>
			<li><a href="/teamchat/index.php"><img src="teamchat.png" alt="teamchat" style="vertical-align:middle" /> TeamChat</a></li>
		</ul>
	</div>
</body>