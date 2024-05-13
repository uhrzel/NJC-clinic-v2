<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection
    include 'config/conn.php';

    // Check if a file is selected
    if (isset($_FILES["xrayImage"]) && $_FILES["xrayImage"]["error"] == 0) {
        $allowed_types = array('jpg', 'jpeg', 'png', 'gif', 'jfif');
        $file_extension = strtolower(pathinfo($_FILES["xrayImage"]["name"], PATHINFO_EXTENSION));

        // Check if the file type is allowed
        if (in_array($file_extension, $allowed_types)) {
            $patientId = $_POST['patientId']; // Get the patient ID from the form

            // Check if the patient directory exists, if not, create it
            $target_dir = "uploads/" . $patientId . "/";
            if (!file_exists($target_dir)) {
                mkdir($target_dir, 0777, true);
            }

            $target_file = $target_dir . basename($_FILES["xrayImage"]["name"]);

            // Move the file to the specified directory
            if (move_uploaded_file($_FILES["xrayImage"]["tmp_name"], $target_file)) {
                // File uploaded successfully, now insert data into database
                $xray_image = $target_file; // Get the path of the uploaded image

                // Prepare and execute SQL query to insert data into xray_table
                $sql = "INSERT INTO xray_table (patient_id, xray_image, date_uploaded) VALUES (?, ?, NOW())";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ss", $patientId, $xray_image);

                if ($stmt->execute()) {
                    // Image uploaded and data inserted successfully
                    echo "X-ray uploaded successfully.";
                } else {
                    // Error inserting data into database
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                // Error moving file to target directory
                echo "Error uploading file.";
            }
        } else {
            // Invalid file type
            echo "Invalid file type. Please upload an image file (jpg, jpeg, png, gif).";
        }
    } else {
        // No file selected or error in file upload
        echo "No file selected or error in file upload.";
    }
} else {
    // Form not submitted via POST method
    echo "Form not submitted.";
}
