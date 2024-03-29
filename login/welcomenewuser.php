<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

//Get the username from the login session variable
$username = $_SESSION["username"];
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Welcome to MyPortal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style001.css">
    <style>
        body {
            background-image: url("../icon/welcomenewuserbackground.png");
        }
        h3 {
            color: white;
        }
        h4 {
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to MyPortal, <?php echo $username; ?>!</h1>
        <br />
        <h2>You've successfully registered with MyPortal!</h2>
        <br />
        <h3>MyPortal is your easy solution to team collaboration and management. Multiple tools, in the form of web apps, are provided to you and your team.</h3>
            <div class="imgcontainer">
                <br />
                <img src="../icon/dashboard-apps-icons.png" alt="dashboard-apps" />
                <p style="color: white;">The current web apps</p>
                <br />
            </div>
        <h3>Web apps are designed to be simple and to provide a core function. One of the most important is the <a href="../filestorage/filemanager/filemanager.php">File Manager</a>, which allows files to be managed across any devices within the network.</h3>
        <br />
        <h3>MyPortal is constantly being updated, with new features and patches coming frequently. Soon, there will be plenty of web apps that handle most of your day-to-day work.</h3>
        <br />
        <h3>MyPortal is secure, because it only runs within your network. So as long as you keep your network secured and a firewall on, MyPortal is secure!</h3>
        <br />
        <h4>Done? <a href="welcome.php">Go Back</a></h4>
        <br />
        <p style="text-align:center;"><img src="../slideshow/MyPortal.png" style="width:720px;height:480px;"/></p>
    </div>
</body>
</html>