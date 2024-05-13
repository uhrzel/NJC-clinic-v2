<?php
// Start the session
session_start();

// Include your database connection
include 'config/conn.php';

// Check if patient_id is set in the session
if (isset($_SESSION['patient_id'])) {
    // Get the patient_id from the session
    $patient_id = $_SESSION['patient_id'];

    // Prepare and execute SQL query to fetch patient details
    $stmt = $conn->prepare("SELECT * FROM patient WHERE patient_id = ?");
    $stmt->bind_param("i", $patient_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if a row is returned
    if ($result->num_rows == 1) {
        // Fetch the row
        $row = $result->fetch_assoc();

        // Return patient details as JSON
        echo json_encode($row);
    } else {
        echo "Patient not found";
    }
} else {
    echo "Patient ID not set in session";
}
