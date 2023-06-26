<?php

include 'db.php';

$Appointments_ID = $_POST['Appointments_ID'];
$PatientsID = $_POST['PatientsID'];
$DoctorsID = $_POST['DoctorsID'];
$AppointmentDate = $_POST['AppointmentDate'];
$AppointmentTime = $_POST['AppointmentTime'];
$DurationMinutes = $_POST['DurationMinutes'];
$ReasonForAppointment = $_POST['ReasonForAppointment'];
$BookedByReceptionistID = $_POST['BookedByReceptionistID'];

$sql = "UPDATE appointments SET PatientsID = '$PatientsID', DoctorsID = '$DoctorsID', AppointmentDate = '$AppointmentDate', AppointmentTime = '$AppointmentTime', DurationMinutes = '$DurationMinutes', ReasonForAppointment = '$ReasonForAppointment', BookedByReceptionistID = '$BookedByReceptionistID' WHERE Appointments_ID = '$Appointments_ID'";

$result = $conn->query($sql);

$conn->close();

header("location: dashboard.php");

?>