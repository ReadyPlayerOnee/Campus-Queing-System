<?php
include('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $currentNumber = $_POST['currentNumber'];

    // Fetch data from the database based on the currentNumber
    $sqlquery = "SELECT * FROM cashier WHERE id = $currentNumber";
    $result = mysqli_query($conn, $sqlquery);

    $data = array();
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $data[] = $row;
    }

    // Return the data as JSON
    echo json_encode($data);

    // Close the database connection
    //mysqli_close($conn);
}
?>


