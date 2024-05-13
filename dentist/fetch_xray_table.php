<?php
// Include your database connection
include 'config/conn.php';

// Check if patient ID is provided
if (isset($_GET['patientId'])) {
    // Retrieve patient ID from GET parameter
    $patientId = $_GET['patientId'];

    // Fetch X-ray data for the specified patient from the database
    $sql = "SELECT xray_table.*, 
                    CONCAT(patient.firstname, ' ', patient.middlename, ' ', patient.lastname) AS patient_name,
                    patient.age,
                    patient.birth,
                    patient.gender
            FROM xray_table 
            INNER JOIN patient ON xray_table.patient_id = patient.patient_id
            WHERE xray_table.patient_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $patientId);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if there are any rows returned
    if ($result && $result->num_rows > 0) {
        // Start building the HTML for the X-ray table
        $html = '';

        // Loop through each row and append it to the HTML
        while ($row = $result->fetch_assoc()) {
            $html .= "<tr>";
            $html .= "<td>" . $row['xray_id'] . "</td>";
            $html .= "<td>" . $row['patient_name'] . "</td>";
            $html .= "<td>" . $row['age'] . "</td>";
            $html .= "<td>" . $row['birth'] . "</td>";
            $html .= "<td>" . $row['gender'] . "</td>";
            $html .= "<td><img src='" . $row['xray_image'] . "' alt='X-ray Image' style='max-width: 200px; max-height: 200px; cursor: pointer;' onclick='openModal(\"" . $row['xray_image'] . "\")'></td>";
            $html .= "<td>" . $row['date_uploaded'] . "</td>";
            $html .= "<td><a href='#' class='btn btn-sm btn-primary' onclick='openViewModal(\"" . $row['xray_image'] . "\", \"" . $row['patient_name'] . "\", \"" . $row['date_uploaded'] . "\", \"" . $row['age'] . "\", \"" . $row['birth'] . "\", \"" . $row['gender'] . "\")'><i class='fas fa-eye'></i> View</a></td>";
            $html .= "</tr>";
        }

        // Close the HTML table
        $html .= "</tbody>";

        // Output the generated HTML
        echo $html;
    } else {
        // If no rows returned, display a message
        echo "<tr><td colspan='8'>No X-rays found</td></tr>";
    }
} else {
    // If patient ID is not provided, display an error message
    echo "<tr><td colspan='8'>Patient ID not provided</td></tr>";
}
