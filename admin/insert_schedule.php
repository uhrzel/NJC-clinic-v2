<?php
// Include your database connection
include 'config/conn.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $patientId = $_POST['editPatientId'];
    $date = $_POST['editPatientDate'];
    $time = $_POST['editPatientTime'];
    $problem = $_POST['editPatientProblem'];
    $payment = $_POST['editPatientPayment'];

    // Fetch patient's contact number based on patient_id
    $sqlPatient = "SELECT firstname, lastname, contactnumber FROM patient WHERE patient_id = '$patientId'";
    $resultPatient = mysqli_query($conn, $sqlPatient);
    $rowPatient = mysqli_fetch_assoc($resultPatient);
    $patientFirstName = $rowPatient['firstname'];
    $patientLastName = $rowPatient['lastname'];
    $patientContactNumber = $rowPatient['contactnumber'];
    // Check if the number of appointments for the selected date exceeds 20
    $sqlCount = "SELECT COUNT(*) as count FROM schedule WHERE `date` = '$date'";
    $resultCount = mysqli_query($conn, $sqlCount);
    $rowCount = mysqli_fetch_assoc($resultCount);
    $appointmentCount = $rowCount['count'];

    $message = "";

    // Check if the appointment count exceeds 20
    if ($appointmentCount >= 20) {
        $message = "Appointment cannot be scheduled. Maximum appointments reached for this date.";
    } else {
        // Perform SQL insertion
        $sql = "INSERT INTO schedule (patient_id, date, time, problem, payment) VALUES ('$patientId', '$date', '$time', '$problem', '$payment')";

        // Check if insertion was successful
        if (mysqli_query($conn, $sql)) {
            $formattedDate = date('F j, Y', strtotime($date)); // Format: January 10, 2001
            $formattedTime = date('h:i A', strtotime($time)); // Format: 10:00 AM

            // Send SMS notification
            $smsParameters = array(
                'apikey' => 'c367070b9d6d34f8ead34a036a9187e6',
                'number' => $patientContactNumber,
                'message' => "NJC - DENTAL CLINIC\nDear $patientFirstName $patientLastName,\nYour appointment is scheduled for $formattedDate at $formattedTime.\nProblem: $problem\nPayment: PHP $payment", // Customize message as needed
                'sendername' => 'SEMAPHORE'
            );

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://semaphore.co/api/v4/messages');
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($smsParameters));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $output = curl_exec($ch);
            curl_close($ch);

            $message = "Appointment scheduled successfully.";
        } else {
            $message = "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    echo $message;
} else {
    // Redirect if accessed directly
    header("Location: index.php"); // Change this to your desired redirect location
    exit();
}
