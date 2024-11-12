<?php
include('../Connection/Connection.php');

if (isset($_GET['did'])) {
    $doctor_id = intval($_GET['did']); // Sanitize input

    // Check the maximum token for today for the selected doctor
    $sel = "SELECT MAX(appoinment_token) AS last_token FROM tbl_appoinment WHERE doctor_id = '".$doctor_id."' AND appoinment_datetime = CURDATE()";
    $result = $con->query($sel);
    
    if ($result) {
        $row = $result->fetch_assoc();
        $last_token = $row['last_token'];

        if ($last_token === null) {
            // No tokens found, set the new token to 1
            $new_token = 1;
        } else {
            // Increment the last token by 1
            $new_token = $last_token + 1;
        }
        
        // Return the new token number
        echo $new_token;

    } else {
        // Return an error message
        echo "error=Error fetching token: " . $con->error;
    }
} else {
    // Return an error message
    echo "error=No doctor ID provided.";
}

$con->close();
?>
