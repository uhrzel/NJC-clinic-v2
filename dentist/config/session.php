<?php
session_start();

// Check if the dentist is not logged in
if (!isset($_SESSION['dentist_id'])) {
    // Redirect to the dentist login page
    header("Location: ../index.php");
    exit();
}

// Access the dentist's ID and username from session
$dentistID = $_SESSION['dentist_id'];
$dentistUsername = $_SESSION['username'];

// Now you can use $dentistID and $dentistUsername throughout the dentist's session
?>
