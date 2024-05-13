<?php
// Include your database connection
include 'config/conn.php';

// Check if the schedule ID and payment amount are set and not empty
if (isset($_POST['scheduleId']) && !empty($_POST['scheduleId']) && isset($_POST['paymentAmount'])) {
    // Sanitize the schedule ID and payment amount to prevent SQL injection
    $scheduleId = mysqli_real_escape_string($conn, $_POST['scheduleId']);
    $paymentAmount = mysqli_real_escape_string($conn, $_POST['paymentAmount']);

    // Update the payment data in the schedule table
    $updateSql = "UPDATE schedule SET payment = payment - $paymentAmount WHERE id = $scheduleId";

    if (mysqli_query($conn, $updateSql)) {
        // If the update was successful, return a success message
        $response = array(
            'success' => true,
            'message' => 'Payment data updated successfully.'
        );
    } else {
        // If there was an error with the update, return an error message
        $response = array(
            'success' => false,
            'message' => 'Error updating payment data: ' . mysqli_error($conn)
        );
    }
} else {
    // If the schedule ID or payment amount is not set or empty, return an error message
    $response = array(
        'success' => false,
        'message' => 'Invalid schedule ID or payment amount.'
    );
}

// Output JSON response
header('Content-Type: application/json');
echo json_encode($response);

// Close the database connection
mysqli_close($conn);
