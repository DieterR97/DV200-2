<?php

include 'db.php';

$Appointments_ID = $_GET["Appointments_ID"];

$sql = "SELECT * FROM appointments WHERE Appointments_ID='$Appointments_ID'";

$result = $conn->query($sql);

while ($row = mysqli_fetch_assoc($result)) {

    $PatientsID = $row['PatientsID'];
    $DoctorsID = $row['DoctorsID'];
    $AppointmentDate = $row['AppointmentDate'];
    $AppointmentTime = $row['AppointmentTime'];
    $DurationMinutes = $row['DurationMinutes'];
    $ReasonForAppointment = $row['ReasonForAppointment'];
    $BookedByReceptionistID = $row['BookedByReceptionistID'];
}

// echo json_encode($doctor); // Returning the JSON string

echo json_encode(
    [
        'PatientsID' => $PatientsID,
        'DoctorsID' => $DoctorsID,
        'AppointmentDate' => $AppointmentDate,
        'AppointmentTime' => $AppointmentTime,
        'DurationMinutes' => $DurationMinutes,
        'ReasonForAppointment' => $ReasonForAppointment,
        'BookedByReceptionistID' => $BookedByReceptionistID,
    ]
);

$conn->close();

?>