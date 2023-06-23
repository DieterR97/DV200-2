<?php

include 'db.php';

$Patients_ID = $_GET['Patients_ID'];

$sql = "DELETE FROM patients WHERE Patients_ID = $Patients_ID";

$conn->query($sql);

$conn->close();

header("location: patients.php");

?>