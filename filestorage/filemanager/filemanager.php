<?php

/**
 * +-------------------------------------------------------------------+
 * |                    F I L E M A N A G E R   (v10.50)               |
 * |                                                                   |
 * | Copyright Gerd Tentler               www.gerd-tentler.de/tools    |
 * | Created: Dec. 7, 2006                Last modified: Mar. 24, 2019 |
 * +-------------------------------------------------------------------+
 * | This program may be used and hosted free of charge by anyone for  |
 * | personal purpose as long as this copyright notice remains intact. |
 * |                                                                   |
 * | Obtain permission before selling the code for this program or     |
 * | hosting this software on a commercial website or redistributing   |
 * | this software over the Internet or in any other medium. In all    |
 * | cases copyright must remain intact.                               |
 * +-------------------------------------------------------------------+
 */

 // Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: /login/login.php");
    exit;
}

include_once('class/FileManager.php');

?>
<!DOCTYPE html>
<html>
<head>
<title>File Manager</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="fmBody">
<table border="0" style="width:100%; height:100%"><tr>
<td align="center">
<?php

$FileManager = new FileManager();
print $FileManager->create();

?>
</td>
</tr></table>
</body>
</html>