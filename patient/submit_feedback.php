<?php
session_start();

// Check if the user is logged in as a patient
if (!isset($_SESSION['patient_id'])) {
    // Redirect to login page if not logged in
    header('Location: index.php');
    exit();
}

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "arzelzolina10";
$dbname = "njc";

// Connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind parameters
$stmt = $conn->prepare("UPDATE patient SET email = ?, feedback = ?, star = ? WHERE patient_id = ?");
$stmt->bind_param("sssi", $email, $feedback, $star, $patient_id);

// Set parameters
$patient_id = $_SESSION['patient_id'];
$email = $_POST['email'];
$feedback = $_POST['feedback'];
$star = $_POST['rating'];

// Execute the query
if ($stmt->execute()) {
    // Feedback submitted successfully
    header('Location: feedback.php?success=true');
    exit();
} else {
    // Error in submission
    echo "Error: " . $stmt->error;
}

// Close statement and connection
$stmt->close();
$conn->close();
