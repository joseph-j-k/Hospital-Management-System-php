<?php
include('../Connection/Connection.php');

if (isset($_GET['dept_id'])) {
    $dept_id = $_GET['dept_id']; // Sanitize input

    // Fetch doctors from the selected department
    $sel = "SELECT * FROM tbl_doctor WHERE dept_id = '".$dept_id."'";
    $result = $con->query($sel);

    if ($result->num_rows > 0) {
        echo '<option value="">Select Doctor</option>';
        while ($row = $result->fetch_assoc()) {
            echo '<option value="'.$row['doctor_id'].'">'.$row['doctor_name'].'</option>';
        }
    } else {
        echo '<option value="">No doctors available</option>';
    }
} else {
    echo '<option value="">No department selected</option>';
}

$con->close();
?>
