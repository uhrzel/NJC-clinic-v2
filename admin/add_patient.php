<?php
// Establish a database connection
$servername = "localhost";
$username = "root"; // Replace with your MySQL username
$password = "arzelzolina10"; // Replace with your MySQL password
$database = "njc"; // Replace with your database name

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Escape user inputs for security
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $middlename = mysqli_real_escape_string($conn, $_POST['middlename']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $birth = mysqli_real_escape_string($conn, $_POST['birth']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $occupation = mysqli_real_escape_string($conn, $_POST['occupation']);
    $height = mysqli_real_escape_string($conn, $_POST['height']);
    $weight = mysqli_real_escape_string($conn, $_POST['weight']);
    $contactnumber = mysqli_real_escape_string($conn, $_POST['contactnumber']);
    $province = mysqli_real_escape_string($conn, $_POST['province']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $postalcode = mysqli_real_escape_string($conn, $_POST['postalcode']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Validate contact number
    if (preg_match("/^09[0-9]{9}$/", $contactnumber)) {
        // Check if contact number already exists in the database
        $check_query = "SELECT * FROM patient WHERE contactnumber = '$contactnumber'";
        $check_result = mysqli_query($conn, $check_query);

        if (mysqli_num_rows($check_result) > 0) {
            echo "Error: Contact number already exists."; // Return error message
        } else {
            // Handle file upload
            $file_name = $_FILES['fileUpload']['name'];
            $file_tmp = $_FILES['fileUpload']['tmp_name'];

            // Move uploaded file to desired location
            $target_dir = "uploads/"; // Specify the directory where you want to store the uploaded files
            $target_file = $target_dir . basename($file_name);
            move_uploaded_file($file_tmp, $target_file);

            // Insert patient data into database, including file path
            $md5password = md5($password);
            $sql = "INSERT INTO patient (firstname, lastname, middlename, age, birth, gender, occupation, height, weight, contactnumber, province, city, postalcode, password, file_path) 
                    VALUES ('$firstname', '$lastname', '$middlename', '$age', '$birth', '$gender', '$occupation', '$height', '$weight', '$contactnumber', '$province', '$city', '$postalcode', '$md5password', '$target_file')";

            if (mysqli_query($conn, $sql)) {
                echo "success"; // Return success message
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn); // Return error message
            }
        }
    } else {
        echo "Error: Contact number should start with '09' and be 11 digits long."; // Return error message for invalid contact number
    }

    // Close database connection
    mysqli_close($conn);
}
