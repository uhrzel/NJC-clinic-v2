<?php
session_start();

// Database connection parameters
$servername = "localhost"; // MySQL server name
$username = "root"; // MySQL username
$password = ""; // MySQL password
$dbname = "scvotingsystem"; // MySQL database name

// Admin login credentials
$admin_username = "admin"; // Admin username
$admin_password = "your_admin_password"; // Admin password

// Connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and execute SQL query to fetch admin data
    $stmt = $conn->prepare("SELECT * FROM admin WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if a row is returned
    if ($result->num_rows == 1) {
        // Fetch the row
        $row = $result->fetch_assoc();
        // Verify password
        if (password_verify($password, $row['password'])) {
            // Admin login successful, create session
            $_SESSION['admin_id'] = $row['admin_id'];
            $_SESSION['username'] = $row['username'];
            header('Location: dashboard.php'); // Redirect to admin dashboard
            exit();
        } else {
            // Invalid password, redirect back to login page
            $_SESSION['login_error'] = 'Invalid username or password';
            header('Location: index.php');
            exit();
        }
    } else {
        // Username not found, redirect back to login page
        $_SESSION['login_error'] = 'Invalid username or password';
        header('Location: index.php');
        exit();
    }
}

// Close database connection
$conn->close();
?>
