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
		<!--The tab section within this page is based on the Chromium Tab design-->
		<link rel="stylesheet" href="/css/tabs.css">
		<script src="/js/promise_resolver.js"></script>
		<script src="/js/cr.js"></script>
		<script src="/js/util.js"></script>
		<script src="/js/ui.js"></script>
		<script src="/js/focus_outline_manager.js"></script>
		<script src="/js/tabs.js"></script>
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

			<h2>Hello, <?php echo $username;?>. What yould you like to change today?</h2>
			
				<div class="container">
					<tabbox id='tabbox'>
						<tabs>
							<tab>Change Password</tab>
							<tab>Delete Account</tab>
						</tabs>
						<tabpanels>
							<tabpanel>
								<h2>Change your Password</h2>
								<div class="container">
									<a href="login/resetpassword.php"><img src="/icon/passkey.png" alt="passkey" style="vertical-align: middle;" /></a>
									<p style="vertical-align: middle;">Change Password</p>
								</div>
								<p>You will be redirected to the password change page by clicking the "Change Password" button above.</p>
							</tabpanel>
							<tabpanel>
								<h2>Delete Account</h2>
								<div class="container">
									<a href="login/deleteaccount.php"><img src="/icon/deleteaccount.png" alt="deleteaccount" style="vertical-align: middle;" /></a>
									<p style="vertical-align: middle;">Delete Account</p>
								</div>
								<p>You will be redirected to the account deletion page by clicking the "Delete Account" button above.</p>
								<br />
								<p>WARNING! You cannot undo this action once it has completed. Your files in the File Manager web app will remain. If you need to delete them, please enter the File Manager web app and delete the files before deleting your account.</p>
							</tabpanel>
						</tabpanels>
					</tabbox>
					<script src="/js/load.js"></script>
			</div>
	</body>
</html>
