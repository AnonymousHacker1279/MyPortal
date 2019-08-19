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

		function DisplayDeleteButton() {
			document.getElementById('DeleteAccountButton').style.display = "block";
		}
	</script>
	<style>
	.capbox {
	background-color: #333;
	border: #FFFFFF 0px solid;
	border-width: 0px 12px 0px 0px;
	display: inline-block;
	*display: inline; zoom: 1; /* FOR IE7-8 */
	padding: 8px 40px 8px 8px;
	}

	.capbox-inner {
	font: bold 11px arial, sans-serif;
	color: #333;
	background-color: #FFFFFF;
	margin: 5px auto 0px auto;
	padding: 3px;
	-moz-border-radius: 4px;
	-webkit-border-radius: 4px;
	border-radius: 4px;
	}

	#CaptchaDiv {
	font: bold 17px verdana, arial, sans-serif;
	font-style: italic;
	color: #000000;
	background-color: #FFFFFF;
	padding: 4px;
	-moz-border-radius: 4px;
	-webkit-border-radius: 4px;
	border-radius: 4px;
	}

	#CaptchaInput { margin: 1px 0px 1px 0px; width: 135px; }
	</style>
</head>
<body style="background-color: red;">
	<h1 style="text-align:center;"><?php echo $username; ?>, are you sure you want to delete your account?</h1>
	<br />
	<h2 style="text-align:center;">You won't be able to undo this! Your account will be removed from MyPortal, but your data in the File Manager will not be removed.</h2>
	<div class="container">
		<!--Require the user to complete a simple question to verify-->
		
		<!-- START CAPTCHA -->
		<div class="container">
		<form method="post" action="deleteaccountbutton.php" onsubmit="return checkform(this);">
		<br>
		<div class="capbox">

		<div id="CaptchaDiv"></div>

		<div class="capbox-inner">
		Type the above number:<br>

		<input type="hidden" id="txtCaptcha">
		<input type="text" name="CaptchaInput" id="CaptchaInput" size="15"><br>

		</div>
		</div>
		<br><br>
		</form>
		<script type="text/javascript">

			// Captcha Script

			function checkform(theform){
			var why = "";

			if(theform.CaptchaInput.value == ""){
			why += "- Please enter the numbers in the CAPTCHA to verify you want to do this.\n";
			}
			if(theform.CaptchaInput.value != ""){
			if(ValidCaptcha(theform.CaptchaInput.value) == false){
			why += "- The CAPTCHA code doesn't match. Try again.\n";
			}
			}
			if(why != ""){
			alert(why);
			return false;
			}
			}

			var a = Math.ceil(Math.random() * 9)+ '';
			var b = Math.ceil(Math.random() * 9)+ '';
			var c = Math.ceil(Math.random() * 9)+ '';
			var d = Math.ceil(Math.random() * 9)+ '';
			var e = Math.ceil(Math.random() * 9)+ '';

			var code = a + b + c + d + e;
			document.getElementById("txtCaptcha").value = code;
			document.getElementById("CaptchaDiv").innerHTML = code;

			// Validate input against the generated number
			function ValidCaptcha(){
			var str1 = removeSpaces(document.getElementById('txtCaptcha').value);
			var str2 = removeSpaces(document.getElementById('CaptchaInput').value);
			if (str1 == str2){
			return true;
			}else{
			return false;
			}
			}

			// Remove the spaces from the entered and generated code
			function removeSpaces(string){
			return string.split(' ').join('');
			}
			</script>
			</div>
		<!-- END CAPTCHA -->
	</div>
</body>
</html>
