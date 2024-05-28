<?php
require_once('config.php');
?>

<!DOCTYPE html>
<html>
<head>
<style>
* {
box-sizing: border-box;
}

.row {
margin-left:-5px;
margin-right:-5px;
}

.container{
display: flex;
justify-content: space-center;
}

.column {
float: left;
width: 50%;
padding: 10px;
}

/* Clearfix (clear floats) */
.row::after {
content: "";
clear: both;
display: table;
}

table {
flex: 1;
border: 2px solid #ccc;
padding: 10px;
margin-right: 60px;
margin-left: -50px;

}

th, td {
text-align: left;
padding: 12px;

}

tr:nth-child(even) {
background-color: #f2f2f2;
}
.cell {
border: 0px solid #ccc;
padding: 2px;
flex: 1;
}

</style>
<title>Admin Panel</title>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
<center><div class="button-container">
<a class="btn btn-primary mt-5" href="index.php">Homepage</a>
<a class="btn btn-primary mt-5" href="tab/que.php">Live Queuing</a>
</div></center>
<div style="overflow-x:auto;">
<div class="container">
<div class="row">
<div class="column">
<table class="table-bordered">
<thead>
<tr>
<th colspan="5" class="bg-white">Registrar</th>
</tr>
</thead>
<tbody>
<tr>
<th class="cell">ID</th>
<th class="cell">FullName</th>
<th class="cell">Course</th>
<th class="cell">Update</th>
<th class="cell">Delete</th>
</tr>
<?php
$sqlquery = "SELECT * FROM registrar";

if ($results = mysqli_query($conn, $sqlquery)) {
while ($row = mysqli_fetch_array($results)) {
echo "<tr>";
echo "<td>".$row['id']."</td>";
echo "<td>".$row['fullname']."</td>";
echo "<td>".$row['course']."</td>";
echo "<td><a class='btn btn-primary' href='update.php?id=".$row['id']."'>Update</a></td>";
echo "<td><a href='delete.php?id=" . $row['id'] . "' class='delete-button'>Delete</a></td>";

echo "</tr>";
}
}
?>
</tbody>
</table>
</div>
</div>
<div class="row">
<div class="column">
<table class="table-bordered">
<thead>
<tr>
<th colspan="5" class="bg-white">Cashier</th>
</tr>
</thead>
<tbody>
<tr>
<th class="cell">ID</th>
<th class="cell">FullName</th>
<th class="cell">Course</th>
<th class="cell">Update</th>
<th class="cell">Delete</th>
</tr>
<?php
$sqlquery = "SELECT * FROM cashier";

if ($results = mysqli_query($conn, $sqlquery)) {
while ($row = mysqli_fetch_array($results)) {
echo "<tr>";
echo "<td>".$row['id']."</td>";
echo "<td>".$row['fullname']."</td>";
echo "<td>".$row['course']."</td>";
echo "<td><a class='btn btn-primary' href='update.php?id=".$row['id']."'>Update</a></td>";
echo "<td><a href='delete.php?id=" . $row['id'] . "' class='delete-button'>Delete</a></td>";

echo "</tr>";
}
}
?>
</tbody>
</table>
</div>
</div>
<div class="row">
<div class="column">
<table class="table-bordered">
<thead>
<tr>
<th colspan="5" class="bg-white">SAS</th>
</tr>
</thead>
<tbody>
<tr>
<th class="cell">ID</th>
<th class="cell">FullName</th>
<th class="cell">Course</th>
<th class="cell">Update</th>
<th class="cell">Delete</th>
</tr>
<?php
$sqlquery = "SELECT * FROM sas";

if ($results = mysqli_query($conn, $sqlquery)) {
while ($row = mysqli_fetch_array($results)) {
echo "<tr>";
echo "<td>".$row['id']."</td>";
echo "<td>".$row['fullname']."</td>";
echo "<td>".$row['course']."</td>";
echo "<td><a class='btn btn-primary' href='update.php?id=".$row['id']."'>Update</a></td>";
echo "<td><a href='delete.php?id=" . $row['id'] . "' class='delete-button'>Delete</a></td>";

echo "</tr>";
}
}
?>
</tbody>
</table>
</div>
</div>
</div>
</div>

<?php
include 'footer.php';
?>
</body>

</html>