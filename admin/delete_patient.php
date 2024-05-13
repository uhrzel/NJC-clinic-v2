<?php
// Include your database connection
include 'config/conn.php';

// Check if the patient ID is received
if (isset($_POST['patientId'])) {
    // Retrieve patient ID from POST data
    $patientId = $_POST['patientId'];

    // SQL delete query
    $sql = "DELETE FROM patient WHERE patient_id = '$patientId'";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        echo "Patient record deleted successfully";
    } else {
        echo "Error deleting patient record: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
