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
    <link rel="stylesheet" href="../style001.css">
    <style>
        body {
            background-image: url("../icon/welcomenewuserbackground.png");
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to MyPortal, <?php echo $username; ?>!</h1>
        <br />
        <h2>You're all set! Let's go!</h2>
        <br />
        <h3>MyPortal is your easy solution to team collaboration and management. Multiple tools, in the form of web apps, are provided to you and your team.</h3>
            <div class="imgcontainer">
                <br />
                <img src="../icon/dashboard-apps-icons.png" alt="dashboard-apps" />
                <p>The current web apps</p>
                <br />
            </div>
        <h3>MyPortal is constantly being updated, with new features and patches coming frequently. Soon, there will be plenty of web apps that handle most of your day-to-day work.</h3>
        <br />
        <h3>MyPortal is secure, because it only runs within your network. So as long as you keep your network secured and a firewall on, MyPortal is secure!</h3>
        <br />
        <h4>Are you ready to begin? Click <a href="welcome.php"><h4>here</h4></a>to begin!</h4>
        <br />
        <p style="text-align:center;"><img src="../slideshow/MyPortal.png"/></p>
    </div>
</body>
</html>