<?php

include 'db.php';

$Appointments_ID = $_GET['Appointments_ID'];

$sql = "DELETE FROM appointments WHERE Appointments_ID = $Appointments_ID";

$conn->query($sql);

$conn->close();

header("location: appointments.php");

?>