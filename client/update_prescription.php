<?php
// Include your database connection
include 'config/conn.php';

// Check if the schedule ID and prescription value are set and not empty
if (isset($_POST['scheduleId']) && !empty($_POST['scheduleId']) && isset($_POST['prescription']) && !empty($_POST['prescription'])) {
    // Sanitize the schedule ID and prescription value to prevent SQL injection
    $scheduleId = mysqli_real_escape_string($conn, $_POST['scheduleId']);
    $prescription = mysqli_real_escape_string($conn, $_POST['prescription']);

    // Update the schedule table
    $updateSql = "UPDATE schedule SET bill_generate = 'prescription checked',  prescripitions = '$prescription' WHERE id = $scheduleId";

    if (mysqli_query($conn, $updateSql)) {
        // If the update was successful, return a success message
        echo json_encode(array('success' => true, 'message' => 'Schedule updated successfully.'));
    } else {
        // If there was an error with the update, return an error message
        echo json_encode(array('success' => false, 'message' => 'Error updating schedule: ' . mysqli_error($conn)));
    }
} else {
    // If the schedule ID or prescription value is not set or empty, return an error message
    echo json_encode(array('success' => false, 'message' => 'Invalid schedule ID or prescription value.'));
}

// Close the database connection
mysqli_close($conn);
?>
