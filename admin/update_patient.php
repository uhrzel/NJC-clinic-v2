<?php
// Include your database connection
include 'config/conn.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve patient ID and other form data
    $patientId = $_POST['editPatientId'];
    $firstname = $_POST['editPatientFirstname'];
    $lastname = $_POST['editPatientLastname'];
    $middlename = $_POST['editPatientMiddlename'];
    $age = $_POST['editPatientAge'];
    $birth = $_POST['editPatientBirth'];
    $gender = $_POST['editPatientGender'];
    $occupation = $_POST['editPatientOccupation'];
    $height = $_POST['editPatientHeight'];
    $weight = $_POST['editPatientWeight'];
    $contactnumber = $_POST['editPatientContactnumber'];
    $province = $_POST['editPatientProvince'];
    $city = $_POST['editPatientCity'];
    $postalcode = $_POST['editPatientPostalcode'];
    $password = md5($_POST['editPatientPassword']);

    // Validate contact number
    if (preg_match("/^09[0-9]{9}$/", $contactnumber)) {
        $file_name = $_FILES['editfileUpload']['name'];
        $file_tmp = $_FILES['editfileUpload']['tmp_name'];

        // Move uploaded file to desired location
        $target_dir = "uploads/"; // Specify the directory where you want to store the uploaded files
        $target_file = $target_dir . basename($file_name);
        move_uploaded_file($file_tmp, $target_file);

        // SQL update query
        $sql = "UPDATE patient SET 
                firstname = '$firstname', 
                lastname = '$lastname', 
                middlename = '$middlename', 
                age = '$age',
                file_path = '$target_file',
                birth = '$birth', 
                gender = '$gender', 
                occupation = '$occupation', 
                height = '$height', 
                weight = '$weight', 
                contactnumber = '$contactnumber', 
                province = '$province', 
                city = '$city', 
                postalcode = '$postalcode',
                password = '$password' 
                WHERE patient_id = '$patientId'";

        // Execute the query
        if (mysqli_query($conn, $sql)) {
            echo "success"; // Return success message
        } else {
            echo mysqli_error($conn); // Return error message
        }
    } else {
        echo "Error: Contact number should start with '09' and be 11 digits long."; // Return error message for invalid contact number
    }

    // Close the database connection
    mysqli_close($conn);
}
