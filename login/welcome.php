<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

$username = $_SESSION['username'];

$verfile = fopen("version.txt", "r");
$version = fgets($verfile);
fclose($version);
?>
<html>
<head>
	<link rel="stylesheet" href="/style001.css">
	<title>Welcome to MyPortal</title>
</head>
<body>
	<div class="container">
		<img src="/code01.jpg" alt="code01" style="width:100%; height:180px; opacity: 0.4;" />
		<div class="centered" style="font-size:50px">Welcome to MyPortal, <?php echo $username; ?></div>
    </div>

	<ul>
		<li><a href="welcome.php">Home</a></li>
		<li><a href="/dashboard/dashboard.php">Dashboard</a></li>
		<li style="float:right"><a href="logout.php"><img src="../logout.png" alt="logout" style="vertical-align:middle"/>Log Out</a></li>
		<li style="float:right"><a href="../accountdetails.php">Account</a></li>
	</ul>

	<br />

	<!-- Slideshow container -->
<div class="slideshow-container">

  <!-- Full-width images with number and caption text -->
  <div class="mySlides fade">
    <div class="numbertext">1 / 5</div><br /><br />
    <img src="/slideshow/filemanager.png" style="width:100%">
    <div class="textblack">Easily manage files for the entire team</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">2 / 5</div><br /><br />
    <img src="/slideshow/richtexteditor.png" style="width:100%">
    <div class="textblack">Create and edit rich-text</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">3 / 5</div><br /><br />
    <img src="/slideshow/code_editor.png" style="width:100%">
    <div class="text">Create and edit code in multiple languages, with syntax highlighting</div>
  </div>

  <div class="mySlides fade">
	<div class="numbertext">4 / 5</div><br /><br />
	<img src="/slideshow/teamchat.png" style="width:100%">
	<div class="textblack">Communicate with other people within your team</div>
  </div>

    <div class="mySlides fade">
	<div class="numbertext">5 / 5</div><br /><br />
	<img src="/slideshow/vm.png" style="width:100%">
	<div class="text">Use online virtual machines as a sandbox or for testing programs</div>
  </div>

  <!-- Next and previous buttons -->
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<!-- The dots/circles -->
<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
  <span class="dot" onclick="currentSlide(4)"></span> 
  <span class="dot" onclick="currentSlide(5)"></span> 
</div>

<script>

var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1} 
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none"; 
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block"; 
  dots[slideIndex-1].className += " active";
}

</script>

<p style="text-align:right;">MyPortal Version <?php echo $version; ?></p>
<p style="text-align:right;"><a href="../about/index.html"><img src="../help24.png" /></a>About MyPortal</p>

<br />
</body>
</html>