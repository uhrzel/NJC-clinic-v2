<?php
// fetch_payment.php

// Establish a database connection
$servername = "localhost";
$username = "root"; // Replace with your MySQL username
$password = "arzelzolina10"; // Replace with your MySQL password
$database = "njc"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    // Return error if connection fails
    echo json_encode(['success' => false, 'error' => 'Connection failed: ' . $conn->connect_error]);
    exit();
}

// Check if patientId parameter is provided
if (!isset($_GET['patientId'])) {
    // Return error if patientId parameter is not provided
    echo json_encode(['success' => false, 'error' => 'Patient ID is required']);
    exit();
}

$patientId = $_GET['patientId'];

// Query the database to fetch the payment amount for the patient
$query = "SELECT payment FROM schedule WHERE patient_id = ?";
$statement = $conn->prepare($query);
$statement->bind_param('i', $patientId); // 'i' indicates integer data type
$statement->execute();
$result = $statement->get_result();

if ($result->num_rows > 0) {
    // Fetch payment amount
    $row = $result->fetch_assoc();
    $payment = $row['payment'];

    // Return payment amount as JSON response
    echo json_encode(['success' => true, 'amount' => $payment]);
} else {
    // Return error if payment amount is not found
    echo json_encode(['success' => false, 'error' => 'Payment amount not found for the patient']);
}

// Close database connection
$statement->close();
$conn->close();
