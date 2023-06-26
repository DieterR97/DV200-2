<?php

session_start();

// Before everything, acknowledge this file.
include 'db.php';

//include the ID of the element you get it from in the square brackets.
$PatientsID = $_POST['Patient'];
$DoctorsID = $_POST['Doctor'];
$AppointmentDate = $_POST['AppointmentDate'];
$AppointmentTime = $_POST['AppointmentTime'];
$DurationMinutes = $_POST['DurationMinutes'];
$ReasonForAppointment = $_POST['ReasonForAppointment'];
// $BookedByReceptionistID = $_POST['BookedByReceptionistID'];

// sql query:
$sql = "INSERT INTO appointments (PatientsID, DoctorsID, AppointmentDate, AppointmentTime, DurationMinutes, ReasonForAppointment, BookedByReceptionistID) VALUES ('$PatientsID', '$DoctorsID', '$AppointmentDate', '$AppointmentTime', '$DurationMinutes', '$ReasonForAppointment', '$_SESSION[Receptionists_ID]')";

// $conn is from db.php. This runs the code with the authentication from the db.php file.
$conn->query($sql);

//You need to close the connection after running the sql to avoid errors.
$conn->close();

// This gives an instruction to go back to a different page
header("location: dashboard.php");

?>