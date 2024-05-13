<?php
session_start();

// Check if the admin is not logged in
if (!isset($_SESSION['admin_id'])) {
    // Redirect to the admin login page
    header("Location: ../index.php");
    exit();
}

// Access the admin's ID and username from session
$adminID = $_SESSION['admin_id'];
$adminUsername = $_SESSION['username'];

// Now you can use $adminID and $adminUsername throughout the admin's session
?>
