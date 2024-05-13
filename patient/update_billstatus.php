<?php
// Include your database connection
include 'config/conn.php';

// Check if the schedule ID and prescription value are set and not empty
if (isset($_POST['scheduleId']) && !empty($_POST['scheduleId']) && isset($_POST['bill_generate']) && !empty($_POST['bill_generate'])) {
    // Sanitize the schedule ID and prescription value to prevent SQL injection
    $scheduleId = mysqli_real_escape_string($conn, $_POST['scheduleId']);
    $bill = mysqli_real_escape_string($conn, $_POST['bill_generate']);

    // Update the schedule table
    $updateSql = "UPDATE schedule SET bill_generate = '$bill' WHERE id = $scheduleId";

    if (mysqli_query($conn, $updateSql)) {
        // If the update was successful, return a success message with the URL of the bill receipt page
        $response = array(
            'success' => true,
            'message' => 'Payment Done.',
            'url' => 'bill_receipt.php?scheduleId=' . $scheduleId // URL of the bill receipt page
        );
    } else {
        // If there was an error with the update, return an error message
        $response = array(
            'success' => false,
            'message' => 'Error updating schedule: ' . mysqli_error($conn)
        );
    }
} else {
    // If the schedule ID or prescription value is not set or empty, return an error message
    $response = array(
        'success' => false,
        'message' => 'Invalid schedule ID or payment value.'
    );
}

// Output JSON response
header('Content-Type: application/json');
echo json_encode($response);

// Close the database connection
mysqli_close($conn);
