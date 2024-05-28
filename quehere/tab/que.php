<?php
// Start session
session_start();

// Check if the served ID is received from the AJAX request
if (isset($_POST['servedId']) && isset($_POST['queue'])) {
// Determine which queue the served ID belongs to and store it accordingly
if ($_POST['queue'] === 'registrar') {
$_SESSION['nowServingDataRegistrar'] = $_POST['servedId']; // Store served ID for Registrar
} elseif ($_POST['queue'] === 'cashier') {
$_SESSION['nowServingDataCashier'] = $_POST['servedId']; // Store served ID for Cashier
} elseif ($_POST['queue'] === 'sas') {
$_SESSION['nowServingDataSAS'] = $_POST['servedId']; // Store served ID for SAS
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Queue Management System</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<style>
.queue-info {
display: flex;
justify-content: center;
align-items: center;
margin-top: 20px;
}

.queue-card {
flex: 1;
text-align: center;
margin: 10px;
}

.queue-card h1 {
font-size: 60px; /* Adjust based on your preference */
margin: 5px 0;
}

.queue-card p {
font-size: 20px;
}

.queue-title {
margin-bottom: 10px;
font-size: 50px;
}
html {
height: 100%; /* set the height of the html element to 100% */
}

body {
background-image: url(.jpg);
background-size: absolute; /* or contain */
background-position: right;
background-repeat: no-repeat;
height: 50vh; /* set the height to the full viewport height */
margin: 0; /* remove default margin */
}
/* Live Clock Styles */
.live-clock {
text-align: center;
font-size: 54px;
margin-bottom: 0px;
}
</style>
</head>
<body>
<div class="live-clock" id="liveClock"></div>

<div class="container">
<div class="row queue-info">
<!-- Registrar Information -->
<div class="col-md-4 queue-card">
<h5 class="queue-title"><b>Registrar:</b></h5>
<?php
if (isset($_SESSION['nowServingDataRegistrar'])) {
echo "<h1 style='font-size: 150px; margin-top: 50px;'>" . $_SESSION['nowServingDataRegistrar'] . "</h1>";
} else {
echo '<p>No data available</p>';
}
?>
</div>
<!-- Cashier Information -->
<div class="col-md-4 queue-card">
<h5 class="queue-title"><b>Cashier:</b></h5>
<?php
if (isset($_SESSION['nowServingDataCashier'])) {
echo "<h1 style='font-size: 150px; margin-top: 50px;'>" . $_SESSION['nowServingDataCashier'] . "</h1>";
} else {
echo "<p>No data available</p>";
}
?>
</div>

<!-- SAS Information -->
<div class="col-md-4 queue-card">
<h5 class="queue-title"><b>SAS:</b></h5>
<?php
if (isset($_SESSION['nowServingDataSAS'])) {
echo "<h1 style='font-size: 150px; margin-top: 50px;'>" . $_SESSION['nowServingDataSAS'] . "</h1>";
} else {
echo "<p>No data available</p>";
}
?>
</div>
</div>
</div>

<?php
include '../footer.php';
?>

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

<script>
function updateClock() {
var now = new Date();
var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
var days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
var day = days[now.getDay()];
var month = months[now.getMonth()];
var date = now.getDate();
var year = now.getFullYear();
var hour = now.getHours();
var minute = now.getMinutes();
var second = now.getSeconds();
var period = "AM";

if (hour >= 12) {
period = "PM";
}
if (hour == 0) {
hour = 12;
}
if (hour > 12) {
hour = hour - 12;
}

hour = hour < 10 ? '0' + hour : hour;
minute = minute < 10 ? '0' + minute : minute;
second = second < 10 ? '0' + second : second;

var time = day + ', ' + month + ' ' + date + ', ' + year + ' ' + hour + ':' + minute + ':' + second + ' ' + period;

document.getElementById('liveClock').innerHTML = time;
setTimeout(updateClock, 1000);
}

updateClock(); // Initial call to start the clock
</script>
</body>
</html>