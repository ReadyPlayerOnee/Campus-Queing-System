<?php
include('config.php');
$id = $fullname = $course  = "";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $tables = array(
        "registrar" => "SELECT FROM registrar WHERE id = ?",
        "cashier" => "SELECT FROM cashier WHERE id = ?",
        "sas" => "SELECT FROM sas WHERE id = ?"
    );
     
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
                    <h1>View</h1>
                    <form action="" method="POST">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <div class="form-group">
                            <label for="fullname">Fullname</label>
                            <p>
                                <?php echo $fullname; ?>
                            </p>
                        </div>
                        <div class="form-group">
                            <label for="course">Course</label>
                            <p>
                                <?php echo $course; ?>
                            </p>
                       
                        <a href="index4.php" class="btn btn-primary mt-4">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>