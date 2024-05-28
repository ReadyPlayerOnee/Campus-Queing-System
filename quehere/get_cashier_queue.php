<?php
// Include your database configuration file
require_once('config.php');

// Assuming your cashier queue table is named 'cashier'
$sql = "SELECT id FROM cashier ORDER BY id ASC LIMIT 1"; // Retrieve the lowest ID (earliest queued)

$result = mysqli_query($conn, $sql);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        // Fetch the now-serving ID
        $row = mysqli_fetch_assoc($result);
        $nowServingId = $row['id'];

        // Return the now-serving ID as JSON
        echo json_encode([$nowServingId]);
    } else {
        // No data available
        echo json_encode(['error' => 'No data available']);
    }
} else {
    // Query execution failed
    echo json_encode(['error' => 'Error executing query: ' . mysqli_error($conn)]);
}

// Close database connection
mysqli_close($conn);
?>
