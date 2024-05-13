<?php
session_start();

// Check if the dentist is not logged in
if (!isset($_SESSION['client_id'])) {
    // Redirect to the dentist login page
    header("Location: register.php");
    exit();
}
date_default_timezone_set('Asia/Manila');
// Access the dentist's ID and username from session
$client_id=$_SESSION['client_id']; // Assuming you have the client's ID
$firstname=$_SESSION['firstname'];
$middlename=$_SESSION['middlename'];
$lastname=$_SESSION['lastname'];
$contactnumber=$_SESSION['contactnumber'];
// Now you can use $dentistID and $dentistUsername throughout the dentist's session
$user = $firstname . " " . $middlename . " " . $lastname;
?>
