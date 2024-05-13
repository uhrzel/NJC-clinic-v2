<?php
// Start session to access session variables
session_start();

// Check if the admin is not logged in
if (!isset($_SESSION['admin_id'])) {
    // Redirect to the admin login page
    header("Location: ../index.php");
    exit();
}

class Database {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "scvotingsystem";
    private $conn;

    public function __construct() {
        // Create connection
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function updateAdminPassword($admin_id, $new_password) {
        // Hash the new password
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        // Prepare SQL statement to update admin's password
        $sql = "UPDATE admin SET password = ? WHERE admin_id = ?";
        $stmt = $this->conn->prepare($sql);

        // Bind parameters and execute the statement
        $stmt->bind_param("si", $hashed_password, $admin_id);
        $result = $stmt->execute();

        // Check if the password was successfully updated
        if ($result) {
            // Password updated successfully
            return true;
        } else {
            // Error occurred while updating password
            return false;
        }
    }

    public function closeConnection() {
        // Close connection
        $this->conn->close();
    }
}

// Get admin's ID and new password from the form
$admin_id = $_SESSION['admin_id'];
$new_password = $_POST['newPassword'];

// Create database object
$database = new Database();

// Update admin's password
if ($database->updateAdminPassword($admin_id, $new_password)) {
    // Password changed successfully
    echo "Password changed successfully";
} else {
    // Failed to change password
    echo "Failed to change password";
}

// Close database connection
$database->closeConnection();
?>
