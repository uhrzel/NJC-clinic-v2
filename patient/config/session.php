<?php
session_start();

// Check if the admin is not logged in
if (!isset($_SESSION['patient_id'])) {
    // Redirect to the admin login page
    header("Location: ../index.php");
    exit();
}

// Access the admin's ID and username from session
$patientID = $_SESSION['patient_id'];
$patientNumber = $_SESSION['username'];

// Now you can use $adminID and $adminUsername throughout the admin's session
