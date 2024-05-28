<?php
	require_once('config.php');

?>

<?php
require_once('config.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $fullname = $_POST['fullname'];
    $course = $_POST['course'];
    $contact = $_POST['contact'];

    $sqlquery = "INSERT INTO registrar (fullname, course, contact) VALUES ('$fullname', '$course', '$contact')";

    if (mysqli_query($conn, $sqlquery)) {
        echo "<center>Successfully Saved!</center>";
    } else {
        echo mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>REGISTRAR SIGNUP</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row mt-5 d-flex justify-content-center">
			<div class="col-sm-5">
				<div class="card p-4 bg-info">
					<center><h1>START QUEUING NOW</h1></center>
					<form action="" method="POST">
						<div class="form-group">
							<label for="fullname"><div>FullName</div></label>
							<input type="text" required name="fullname" class="form-control" id="fullname">
						</div>
						<div class="form-group">
							<label for="course" required name = "contact" id="course">Course</label>
							<select name="course" required class="form-control">
								<option value="BSIT">Batchelor of Science and Information Tec</option>
								<option value="BSMB">Batchelor of Science and Marine Bio</option>
								<option value="BSA">Batchelor of Science and Agriculture</option>
							</select>
						</div>
						<!<div class="form-group">
							<div class="form-group">
							<label for="contact">Contact Number</label>
							<input type="number" required name="contact" class="form-control" id="contact">
						</div>
						<button type="submit" class="btn btn-primary mt-4">Create</button>
						<a href="tab/registrar.php" class= "btn btn-primary mt-4">Return</a>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>


