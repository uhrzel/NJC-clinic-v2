<?php
// Include your database connection
include 'config/conn.php';

// Check if patientId is set in the POST request
if(isset($_POST['patientId'])) {
    // Sanitize the input to prevent SQL injection
    $patientId = mysqli_real_escape_string($conn, $_POST['patientId']);

    // Query to fetch patient data based on patient ID
    $sql = "SELECT * FROM patients WHERE patient_id = '$patientId'";
    $result = mysqli_query($conn, $sql);

    // Check if query was successful
    if($result) {
        // Check if patient data was found
        if(mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            // Convert patient data to JSON format and echo it
            echo json_encode($row);
        } else {
            // If patient data was not found, echo an error message
            echo "Patient data not found";
        }
    } else {
        // If query was not successful, echo an error message
        echo "Error: " . mysqli_error($conn);
    }
} else {
    // If patientId is not set in the POST request, echo an error message
    echo "Patient ID not provided";
}

// Close database connection
mysqli_close($conn);
?>
