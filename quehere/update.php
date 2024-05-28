<?php
include('config.php');
$id = $fullname = $contact = $car = $model = $address = $dateofpurchase = $dateofrelease = "";

// Check if ID is provided in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch existing values from the database
    $sqlquery = "SELECT * FROM registrar WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sqlquery);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        if ($data = mysqli_fetch_assoc($result)) {
            $fullname = $data['fullname'];
            $course = $data['course'];
            

        }
        
        mysqli_stmt_close($stmt);
    }
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];
    $fullname = $_POST['fullname'];
    $course = $_POST['course'];
    

    $sqlquery = "UPDATE registrar SET fullname=?, course=? WHERE id=?";
        
    $stmt = mysqli_prepare($conn, $sqlquery);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sss", $fullname, $course, $id);
        
        if (mysqli_stmt_execute($stmt)) {
    echo '<script>';
    echo 'alert("Successfully Updated!");';
    echo 'window.location.href = "admin.php";';
    echo '</script>';
} else {
    echo '<script>';
    echo 'alert("Error: ' . mysqli_stmt_error($stmt) . '");';
    echo 'window.location.href = "cash_reg_sas";';  // Redirect even on error to go back to the list
    echo '</script>';
}
}
}


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch existing values from the database
    $sqlquery = "SELECT * FROM cashier WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sqlquery);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        if ($data = mysqli_fetch_assoc($result)) {
            $fullname = $data['fullname'];
            $course = $data['course'];
            

        }
        
        mysqli_stmt_close($stmt);
    }
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];
    $fullname = $_POST['fullname'];
    $course = $_POST['course'];
    

    $sqlquery = "UPDATE cashier SET fullname=?, course=? WHERE id=?";
        
    $stmt = mysqli_prepare($conn, $sqlquery);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sss", $fullname, $course, $id);
        
        if (mysqli_stmt_execute($stmt)) {
    echo '<script>';
    echo 'alert("Successfully Updated!");';
    echo 'window.location.href = admin.php";';
    echo '</script>';
} else {
    echo '<script>';
    echo 'alert("Error: ' . mysqli_stmt_error($stmt) . '");';
    echo 'window.location.href = "index.php";';  // Redirect even on error to go back to the list
    echo '</script>';
}
}
}


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch existing values from the database
    $sqlquery = "SELECT * FROM sas WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sqlquery);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        if ($data = mysqli_fetch_assoc($result)) {
            $fullname = $data['fullname'];
            $course = $data['course'];
            

        }
        
        mysqli_stmt_close($stmt);
    }
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];
    $fullname = $_POST['fullname'];
    $course = $_POST['course'];
    

    $sqlquery = "UPDATE sas SET fullname=?, course=? WHERE id=?";
        
    $stmt = mysqli_prepare($conn, $sqlquery);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sss", $fullname, $course, $id);
        
        if (mysqli_stmt_execute($stmt)) {
    echo '<script>';
    echo 'alert("Successfully Updated!");';
    echo 'window.location.href = "admin.php";';
    echo '</script>';
} else {
    echo '<script>';
    echo 'alert("Error: ' . mysqli_stmt_error($stmt) . '");';
    echo 'window.location.href = "index.php";';  // Redirect even on error to go back to the list
    echo '</script>';
}
}
}


// Rest of your update.php code remains unchanged
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row mt-5 d-flex justify-content-center">
            <div class="col-sm-5">
                <div class="card p-4">
                    <h1>Update</h1>
                    <form action="" method="POST">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <div class="form-group">
                            <label for="fullname">Fullname</label>
                            <input type="text" value="<?php echo $fullname; ?>" required name="fullname" class="form-control" id="fullname">
                        </div>
                        <div class="form-group">
                            <label for="course" required name = "contact" id="course">Course</label>
                            <select name="course" required class="form-control">
                                <option value="BSIT">Batchelor of Science and Information Tec</option>
                                <option value="BSMB">Batchelor of Science and Marine Bio</option>
                                <option value="BSA">Batchelor of Science and Agriculture</option>
                            </select>
                        </div>
                        
                        <button type="submit" class="btn btn-primary mt-4">Update</button>
                        <a href="admin.php" class="btn btn-primary mt-4">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>

