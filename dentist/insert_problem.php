<?php
// Include your database connection
include 'config/conn.php';

// Check if the form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $patientId = $_POST['editPatientId'];
    $problem = $_POST['editPatientProblem'];

    // Check if the patient already has a record in the problems table
    $checkSql = "SELECT * FROM schedule WHERE patient_id = ?";
    $checkStmt = $conn->prepare($checkSql);
    $checkStmt->bind_param("i", $patientId);
    $checkStmt->execute();
    $result = $checkStmt->get_result();

    if ($result->num_rows > 0) {
        // If the patient already has a record, update the existing record
        $updateSql = "UPDATE schedule SET other_problem = ? WHERE patient_id = ?";
        $stmt = $conn->prepare($updateSql);
        $stmt->bind_param("si", $problem, $patientId);
    } else {
        echo json_encode(array('success' => false, 'message' => 'Error updating/adding problem: ' . $conn->error));
    }

    // Execute the prepared statement
    if ($stmt->execute()) {
        // If insertion/update is successful, return success message
        echo json_encode(array('success' => true, 'message' => 'Problem updated/added successfully.'));
    } else {
        // If insertion/update fails, return error message
        echo json_encode(array('success' => false, 'message' => 'Error updating/adding problem: ' . $conn->error));
    }

    // Close the prepared statement
    $stmt->close();
} else {
    // If form data is not submitted, return error message
    echo json_encode(array('success' => false, 'message' => 'Form data not submitted.'));
}

// Close the database connection
$conn->close();
?>
