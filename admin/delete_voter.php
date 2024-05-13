<?php
// Include your database connection
include 'config/conn.php';

// Check if the voter ID is set and not empty
if(isset($_POST['voterId']) && !empty($_POST['voterId'])) {
    // Sanitize the input to prevent SQL injection
    $voterId = mysqli_real_escape_string($conn, $_POST['voterId']);

    // Construct the SQL DELETE query
    $sql = "DELETE FROM voters WHERE id = '$voterId'";

    // Execute the DELETE query
    if(mysqli_query($conn, $sql)) {
        // Deletion successful
        echo "Voter deleted successfully.";
    } else {
        // Error handling if the deletion fails
        echo "Error deleting voter: " . mysqli_error($conn);
    }
} else {
    // If voter ID is not provided or empty
    echo "Invalid voter ID.";
}

// Close the database connection
mysqli_close($conn);
?>
