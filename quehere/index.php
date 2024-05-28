<?php
include 'config.php';
// Set session timeout in seconds (e.g., 30 minutes)
define('SESSION_TIMEOUT', 600); // 10 minutes



// Start or resume session
session_start();

// Check if a session exists
if (isset($_SESSION['user1_id'])) {
// Check if last activity timestamp is set
if (isset($_SESSION['last_activity']) && time() - $_SESSION['last_activity'] > SESSION_TIMEOUT) {
// Session expired, destroy session
session_unset();
session_destroy();
// Redirect to login page with a message indicating session expired
header("Location: login_1.php?expired=true");
exit();
} else {
// Update last activity timestamp
$_SESSION['last_activity'] = time();
}
} else {
// No session exists, redirect to login page
header("Location: login_1.php");
exit();
}

?>

<html lang="en">
<head>
<style>
/* Reset and responsive styles */
* {
box-sizing: border-box;
margin: 0;
padding: 0;
}

body {
font-family: Arial, sans-serif;
line-height: 1.6;
}

.container {
max-width: 1200px;
margin: 0 auto;
padding: 0 20px;
}

/* Navigation styles */
.navbar {
position: sticky;
top: 0;
z-index: 1;
background-color: #333;
color: #fff;
padding: 10px 0;
display: flex;
justify-content: space-between;
align-items: center;
}

.container {
display: flex;
justify-content: space-between;
align-items: center;
width: 100%;
max-width: 1200px;
margin: 0 auto;
padding: 0 20px;
}

.logo-and-title {
display: flex;
align-items: center;

}

.navbar-brand {
font-weight: bold;
text-decoration: none;
color: #fff;
display: flex;
align-items: center;
margin-left: 10px; /* Adjust spacing between logo and text as needed */
}

.sidenav {
width: 0; /* Initial state of the sidebar */
position: fixed;
z-index: 2;
top: 0;
right: 0;
background-color: #333;
overflow-x: hidden; /* Prevents horizontal scroll */
transition: 0.5s; /* Smooth transition for opening and closing */
padding-top: 60px;
}

.sidenav a {
padding: 8px 32px 8px 8px; /* Adjusted padding for right-side appearance */
text-decoration: none;
font-size: 18px;
color: #818181;
display: block;
transition: 0.3s;
}
.container1 {
text-align: right;
margin-left: 50px;  
padding-left: 30px;  
}

.sidenav a:hover {
color: #f1f1f1;
}

.sidenav .closebtn {
position: absolute;
top: 0;
right: 25px; /* Ensure the close button is on the right */
font-size: 36px;
margin-left: 50px;
color: #fff;
}
.image-container img {
max-width: 100%;
height: auto;
padding-left: 5px;
}
.text-container {
margin-right: 10px; /* Adjust the value as needed */
}

.navbar .container {
max-width: 100%;
padding: 0 20px;
}

.manage {
font-size: 50px;
text-align: right;
margin-right: 50px;  
padding-right: 30px;
}

.button-container {
margin-right: 50px; /* Adjust the value as needed */
text-align: right;
margin-right: 50px;
padding-right: 30px;
}

.para {
font-size: 20px;
text-align: right;
margin-right: 80px;  
padding-right: 30px;
}
/* Content styles */
.content-container {
display: flex;
flex-direction: row-reverse;
align-items: center;
margin-top: 50px;
}

.hidden.md\:flex {
display: flex;
gap: 30px; /* Adjust gap as needed */
margin-left: 550px;
}

.hidden.md\:flex a {
color: white;
text-decoration: none;
}

.hidden.md\:flex a:hover {
color: #bdbdbd; /* Adjust hover color as needed */
}
</style>
<title>Campus Queuing System</title>
<link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.min.css">

</head>
<body>
<section class="navbar">
<div class="container">
<div class="logo-and-title">
<img src="logo2.png" alt="Logo" style="height: 50px; margin-right: 10px;">
<a class="navbar-brand" href="index.php">Campus Queuing System</a>
</div>
<div class="hidden md:flex space-x-4">
<a href="index.php" class="hover:text-zinc-400">Home</a>
<a href="aboutus.php" class="hover:text-zinc-400">About Us</a>
</div>
<span style="font-size:30px;cursor:pointer;color:#fff;" onclick="openNav()">&#9776;</span>
</div>
</section>

<div id="mySidenav" class="sidenav">
<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
<a href="log-in.php">Admin</a>
<a href="logout.php">Logout</a>
</div>

<div class="container">
<div class="content-container">
<div class="text-container">
<h1 class="manage">Manage queues and reduce hassle</h1>
<p class="para">Improve the waiting experience and prioritize first come, first serve.</p>
<div class="button-container">
<button class="btn btn-secondary" onclick="window.open('tab/pick1.php', '_blank')">Try for free</button>
</div>
</div>
<div class="image-container">
<img src="ui.png" alt="University Campus" width="500" height="600">
</div>
</div>
</div>
<script>
function openNav() {
var sidenav = document.getElementById("mySidenav");
var maxWidth = 0;
// Measure each child element to find the needed width
Array.from(sidenav.getElementsByTagName("a")).forEach(function(element) {
// Temporarily set a large width to measure the natural content width
sidenav.style.width = "250px";
var elementWidth = element.offsetWidth;
maxWidth = Math.max(maxWidth, elementWidth);
});
// Set width based on content + some padding
sidenav.style.width = (maxWidth + 60) + "px"; // Adjust padding here
}

function closeNav() {
document.getElementById("mySidenav").style.width = "0";
}
</script>

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

<?php include 'footer.php'; ?>

</body>
</html>
