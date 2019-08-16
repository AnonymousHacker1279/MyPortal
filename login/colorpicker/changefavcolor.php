<?php

   // Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html> 
<head> 
    <!--Powered by Farbtastic-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<script type="text/javascript" charset="utf-8" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<title>Change Favorite Color</title> 
<script type="text/javascript" charset="utf-8" src="colorpicker/src/farbtastic.js"></script>
<script type="text/javascript" charset="utf-8">
    $(function () { $('#colorpicker1').farbtastic('#color1'); 
	   $('#colorpicker2').farbtastic({ callback: '#color2', width: 150 });
	 });
</script> 
<link rel="stylesheet" href="../style001.css">
</head>
<body>
    <h1 style="text-align:center;">Change your favorite color</h1>
    <br />
    <h3 style="text-align:center;">Your favorite color is used in places like the navigation bar, to add more personalization to your pages.</h3>
<div class="colorpicker">
    <div id="colorpicker1"></div> 
    <form action="selectcolor.php" method="post">
    <input type="text" id="color1" name="HexValue" />
    <h4>Use the color wheel above to change your color, or type in a hex value to the text box. When you are done, click the "Select this color" button.</h4>
    <br />
    <input type="submit" value="Select this color">
    </form>
</div> 
</body>
</html>
