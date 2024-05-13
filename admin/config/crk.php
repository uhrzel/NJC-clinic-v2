<?php
// Database connection parameters
// $servername = "localhost"; // MySQL server name
// $username = "root"; // MySQL username
// $password = ""; // MySQL password
// $dbname = "njc"; // MySQL database name

// // Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);

// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// // Example dentist data
// $username = "dentist"; // Dentist username
// $password = "dentist123"; // Dentist password

// // Hash the password
// $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// // Insert the example dentist into the dentists table
// $sql = "INSERT INTO dentist (username, password) VALUES ('$username', '$hashedPassword')";
// if ($conn->query($sql) === TRUE) {
//     echo "New record created successfully<br>";
//     echo "Dentist username: " . $username . "<br>";
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }

// // Close database connection
// $conn->close();
?>

<?php
$servername = "localhost"; // MySQL server name
$username = "root"; // MySQL username
$password = ""; // MySQL password
$dbname = "njc"; // MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Admin details
$admin_id = 1; // Admin ID to update
$admin_password = "dentist123"; // New password for the admin

// Hash the admin password
$hashed_admin_password = password_hash($admin_password, PASSWORD_DEFAULT);

// Update admin password in the database
$sql_update_admin = "UPDATE dentist SET password='$hashed_admin_password' WHERE dentist_id=$admin_id";

if ($conn->query($sql_update_admin) === TRUE) {
    echo "Admin password updated successfully<br>";
    echo "New hashed password: " . $hashed_admin_password . "<br>";
} else {
    echo "Error updating admin password: " . $conn->error . "<br>";
}

// Close database connection
$conn->close();
?>

