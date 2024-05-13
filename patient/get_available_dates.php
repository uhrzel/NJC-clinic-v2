<?php
// Include your database connection
include 'config/conn.php';

// Get the current month and year
$currentMonth = date('m');
$currentYear = date('Y');

// Get the total number of days in the current month
$totalDays = cal_days_in_month(CAL_GREGORIAN, $currentMonth, $currentYear);

// Array to store events data
$events = array();

// Loop through each day of the month
for ($day = 1; $day <= $totalDays; $day++) {
    // Construct the date format (YYYY-MM-DD)
    $date = sprintf('%04d-%02d-%02d', $currentYear, $currentMonth, $day);

    // Get the count of appointments for this date
    $sql = "SELECT COUNT(*) as count FROM schedule WHERE `date` = '$date'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $appointmentCount = $row['count'];

    // Set the event title based on the appointment count
    $eventTitle = ($appointmentCount == 0) ? 'Available' : $appointmentCount . ' patient';

    // Store the date and event title
    $events[] = array(
        'title' => $eventTitle,
        'start' => $date
    );
}

// Output the events data in JSON format
header('Content-Type: application/json');
echo json_encode($events);
