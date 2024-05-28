<?php
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Define an array to hold the table names and their corresponding delete queries
    $tables = array(
        "registrar" => "DELETE FROM registrar WHERE id = ?",
        "cashier" => "DELETE FROM cashier WHERE id = ?",
        "sas" => "DELETE FROM sas WHERE id = ?"
    );

    // Loop through each table to perform deletion
    foreach ($tables as $table => $deleteQuery) {
        $stmt = mysqli_prepare($conn, $deleteQuery);

        if ($stmt) {
            if ($table == "cashier" || $table == "sas") {
                mysqli_stmt_bind_param($stmt, "s", $id); // Assuming the ID is always a string
            } else {
                mysqli_stmt_bind_param($stmt, "i", $id); // Assuming the ID is always an integer
            }

            if (mysqli_stmt_execute($stmt)) {
                echo '<script>';
                echo 'alert("Successfully Deleted from ' . $table . '!");';
                echo 'window.location.href = "admin.php";';
                echo '</script>';
            } else {
                echo '<script>';
                echo 'alert("Error: ' . mysqli_stmt_error($stmt) . '");';
                echo 'window.location.href = "admin.php";';  
                echo '</script>';
            }

            mysqli_stmt_close($stmt);
        } else {
            echo '<script>';
            echo 'alert("Error: ' . mysqli_error($conn) . '");';
            echo 'window.location.href = "admin.php";';
            echo '</script>';
        }
    }
} else {
    echo '<script>';
    echo 'alert("Invalid or Missing ID!");';
    echo 'window.location.href = "admin.php";';
    echo '</script>';
}
?>
