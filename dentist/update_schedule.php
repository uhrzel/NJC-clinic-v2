<?php
// Include your database connection
include 'config/conn.php';

// Check if the schedule ID is set and not empty
if (isset($_POST['editPatientId']) && !empty($_POST['editPatientId'])) {
    // Sanitize the schedule ID to prevent SQL injection
    $editPatientId = mysqli_real_escape_string($conn, $_POST['editPatientId']);

    // Update the schedule table
    $updateSql = "UPDATE schedule SET bill_generate = 'prescription unchecked' WHERE id = $editPatientId";

    if (mysqli_query($conn, $updateSql)) {
        // If the update was successful, return a success message
        echo json_encode(array('success' => true, 'message' => 'Schedule updated successfully.'));
    } else {
        // If there was an error with the update, return an error message
        echo json_encode(array('success' => false, 'message' => 'Error updating schedule: ' . mysqli_error($conn)));
    }
} else {
    // If the schedule ID is not set or empty, return an error message
    echo json_encode(array('success' => false, 'message' => 'Invalid schedule ID.'));
}

// Close the database connection
mysqli_close($conn);
